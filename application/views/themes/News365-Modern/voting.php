
<script>
    function pulled()
    {
        var question_id = document.getElementById('question_id').value;
        var vote = document.getElementsByName('vote');
        var vote_value;
        for (var i = 0; i < vote.length; i++) {
            if (vote[i].checked) {
                vote_value = vote[i].value;
            }
        }
        $.ajax({ 
            'url': '<?php echo base_url();?>' + 'Home_controller/save/'+question_id+'/'+vote_value,
            'type': 'GET', 
            'data': {'vote_value': vote_value },
            'success': function(data) {
                if(data==1){$(".result").html('<h4><?php echo display('vot_save_msg')?>.</h4>');}else{$(".result").html('<h3> <?php echo display('vot_exist_msg')?></h3>');}            
            }
        });              
    }
</script>


<form action="javascript:pulled();" method="post">
    <div class="vote_wrapper">
        <div class="vote">
            <p>
                <?php echo $pull['question']; ?>
                <input type="hidden" id="question_id" value="<?php echo @$pull['id']; ?>" />
            </p>
            <div class="radio-btn">
                <label class="radio-inline"><input type="radio" name="vote" id="vote1" value="yes" ><?php echo display('yes')?></label>
                <label class="radio-inline"><input type="radio" name="vote" id="vote2" value="no" ><?php echo display('no')?></label>
                <label class="radio-inline"><input type="radio" name="vote" id="vote3" value="on_comment" /><?php echo display('no_comment')?></label> 
            </div>
            <button type="submit" name="vote_submit" class="btn btn-style"><?php echo display('submit')?></button>
             <a href="<?php echo base_url()?>Home_controller/result" class="btn btn-style"><?php echo display('result')?></a>
        </div>
        <div class="result">
        </div>
    </div>
</form>
