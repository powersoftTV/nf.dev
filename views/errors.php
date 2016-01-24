<div class="panel panel-danger error-occured center-block">
    
	<div class="panel-heading">
        <div class="panel-title"><h3>An Error Occured</h3></div>
            
    </div>
    <div class="panel-body">
        Please review the following error<?php if(count($errors)>1){ echo 's';} ?>:
        <br>
        <a href="/" class="small" onClick="history.back();">Return to previous page</a>
        
    </div>
        <ul>
	<?php
		foreach ($errors as $key=>$value)
		{
			echo '<li>'.$value.'</li>';
		}
	?>
    </ul>
    
    
</div>