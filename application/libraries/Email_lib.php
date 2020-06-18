<?php   

/* 
|--------------------------------------------------------
| SEND SMS API
| @author : Md. Shohrab Hossain
| @email  : <sourav.diubd@gmail.com>
| @created at: 23 Dec 2017
|--------------------------------------------------------
| $this->load->library('email_lib');
| $this->email_lib->send(array(
|     'from'     => 'from@example.com', 
|     'to'       => 'to@example.com', 
|     'subject'  => 'Test Subject', 
|     'template' => 'Hello %x%', 
|     'template_config' => array('x'=>'Mr. X'), 
|     'attach'   => array('/path/file1.jpg', '/path/file2.jpg'), 
| ));
|--------------------------------------------------------
*/

class Email_lib 
{ 

    $ci =& get_instance();
    $em = $ci->db->select('*')->from('email_config')->where('id',1)->where('status',1)->get()->row();
    #smtp default configuration
    private $_protocol  = $em->smtp_protocol; 
    private $_smtp_host = $em->smtp_host; 
    private $_smtp_port = $em->smtp_port; 
    private $_username  = $em->smtp_username;
    private $_password  = $em->smtp_password;
    private $_from      = $em->smtp_username;
    private $_to;
    private $_subject;
    private $_message; 
    private $_attach    = array();
    private $_mailtype  = "html"; 
    private $_charset   = "utf-8"; 
    private $_newline   = "rn"; 
 

    public function send($config = array())
    {


        if (isset($config['from']) && !empty($config['from']))
        {
            $this->_form = $config['from'];
        } 

        $this->_message = $config['template'];

        if (is_array($config['template_config']) && sizeof($config['template_config']) > 0)
        {
            $this->_message = $this->_template($config['template'], $config['template_config']);
        }

        if (isset($config['attach']) && is_array($config['attach']) && sizeof($config['attach']) > 0)
        {
            $this->_attach = $config['attach'];
        }

        $this->_to      = $config['to'];
        $this->_subject = $config['subject'];

        #send mail
        return $this->response();

    }


    private function response()
    {


$data = array(
            'protocol'  => $this->_protocol,
            'smtp_host' => $this->_smtp_host,
            'smtp_port' => $this->_smtp_port,
            'smtp_user' => $this->_username,
            'smtp_pass' => $this->_password,
            'mailtype'  => $this->_mailtype,
            'charset'   => $this->_charset,
            'newline'   => $this->_newline
        );
echo "<pre>";
print_r($data); exit;

        // Configure email library 
        $ci->load->library('email', array(
            'protocol'  => $this->_protocol,
            'smtp_host' => $this->_smtp_host,
            'smtp_port' => $this->_smtp_port,
            'smtp_user' => $this->_username,
            'smtp_pass' => $this->_password,
            'mailtype'  => $this->_mailtype,
            'charset'   => $this->_charset,
            'newline'   => $this->_newline
        ));

        $ci->email->from($this->_from);
        $ci->email->to($this->_to);
        $ci->email->subject($this->_subject);
        $ci->email->message($this->_message);

        if (isset($this->_attach) && is_array($this->_attach) && sizeof($this->_attach) > 0)
        {
            foreach ($this->_attach as $attached) {
                $ci->email->attach($attached);  
            }
        }

        if($ci->email->send())
        {
            return json_encode(array(
                'status'      => true,
                'message'     => 'Mail sent!'
            ));
        }
        else
        {
            $err = json_encode($ci->email->print_debugger());
            return json_encode(array(
                'status'      => true,
                'message'     => "Error: ". $err 
            ));  
        }
    }

   
    private function _template($template = null, $data = array())
    {
        $newStr = $template;
        foreach ($data as $key => $value) {
            $newStr = str_replace("%$key%", $value, $template);
        }  
        return $newStr; 
    }
  
}


