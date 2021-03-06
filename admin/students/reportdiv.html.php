			<div id="repot">
            <div class = "report-header">
            <?php  if (count($cart) > 0): ?>
					<img id="logo" src="../../images/comradelogo.jpg" />
                    <h4> 10, Olaoluwa Street, Oluwo Bus Stop, Opelu, Ijoko Road, Agbado, Ogun State.<br>
					08062247210, 08162082226</h4>
					<h4>Report Sheet For <?php htmlout($term.' '.$session); ?> Session</h4>
               <div class="pull-left">
                     <h5><?php
                    echo 'Name: ';
                    htmlout($surname.' '.$firstname.' '.$othername);?></h5>
                    <h5><?php echo 'Class Teacher: ';
                     htmlout($_SESSION['teacher']); ?></h5>
					  <h5><?php echo 'Class: ';
                     htmlout($class); ?></h5>
                    
                </div>
				<div class="result-photo">
					<img src="<?php if ($photo == ""){htmlout('https://via.placeholder.com/150');}else{ htmlout($photo);} ?>" />
				</div>
                <div class="pull-right">
				  <h5><?php echo 'Reg No: ';
                     htmlout($regnumber); ?></h5>
					  <h5><?php echo 'Term: ';
                     htmlout($term); ?></h5>
				 <h5><?php echo 'Date: '.date('d-m-Y');?></h5>   
               </div>
			   </div>
              <div class="report-upper">
			   <legend>Cognitive Ability</legend>
               <table class="table table-sm table-striped ">
			   
  <thead>
    <tr>
      <th colspan=5>Subject</th>
      <th scope="col">1st Test(20)</th>
	  <th scope="col">2nd Test(20)</th>
	  <th scope="col">Exam(60)</th>
	  <th scope="col">Total</th>
	 
	  
    </tr>
  </thead>
  <tfoot>
<tr>
<td>overall Total:</td>
	<td colspan=7 ></td>
	<td><?php echo $total; ?></td>
</tr>
<tr>
	<td colspan=7 >Average:</td>
	<td></td>
	<td><?php echo round($total/count($cart),2); ?></td>
</tr>
<tr>
<tr>
	<td >Number in Class:</td>
	<td><?php htmlout($numberInClass); ?></td>
	<td colspan=5></td>
	<td>Position:</td>
<td><?php 
	if($position==0){
		htmlout('No Position Yet');
	}else{
    if(($position>3 && $position<20) || $position{strlen($position)-2} == 1){
      //return nstring + "th";
	  htmlout($position. "th");
    }
    else if($position==1 || $position{strlen($position)-1} == 1){
      //return nstring + "st";
	  htmlout($position. "st");
    }
    else if($position==2 || $position{strlen($position)-1} == 2){
      //return nstring + "nd";
	  htmlout($position. "nd");
    }
    else if($position==3 || $position{strlen($position)-1} == 3){
      //return nstring + "rd";
	  htmlout($position. "rd");
    }
    else{
       //return nstring + "th";
	   htmlout($position. "th");
    }
	}
	?></td>
</tr>

</tfoot>
  <tbody>
      <?php foreach ($cart as $report): ?>
 
      <tr>
      <td colspan=5><?php htmlout($report['subject']); ?></td>
      <td><?php htmlout($report['test1']); ?></td>
      <td><?php htmlout($report['test2']); ?></td>
      <td><?php htmlout($report['score']); ?></td>
	  <td><?php htmlout($report['total']); ?></td>
	 
	</tr>
  
      <?php endforeach; ?>
         </tbody>
       </table>
	   </div>
                <?php else: ?>
			<p>Your report is empty!</p>
		<?php endif; ?>
	<div class = "report-lower">
		<div class = "lower-right">
			<legend>Psychomonous Skills</legend>
		<table class="table table-sm table-striped ">
  <thead>
    <tr>
      <td scope="col">S/No</td>
	  <td scope="col">Title</td>
	  <td scope="col">A</td>
      <td scope="col">B</td>
	  <td scope="col">C</td>
	  <td scope="col">D</td>
	  <td scope="col">E</td>  
    </tr>
  </thead>
  <tbody>
<?php $sn_count = 1 ?>
   <?php for ($i = 0; $i < count($skills); $i++): ?>
    <tr>
	  <td><?php htmlout($sn_count); ?></td>
	  <input type="hidden"  name = "skills[]" value="<?php htmlout($skills[$i]['id']); ?>" />
      <td><?php htmlout($skills[$i]['title']); ?></td>
      <?php for ($j = 1; $j < 6; $j++): ?>
            <td><input type="checkbox" 
              name="sgrades[]" id=grade<?php echo $j; ?> 
			  value="<?php htmlout($j); ?>" <?php
              if ($j == $sgrades[$i])
              {
                echo 'checked';
              }
              ?>></td> 
			<?php endfor; ?>
	</tr>
  <?php $sn_count++; endfor; ?>
         </tbody>
       </table>
			</div>
			<div class = "lower-left">
					<legend>Affective Disposition </legend>
		<table class="table table-sm table-striped ">
  <thead>
    <tr>
      <td scope="col">S/No</td>
	  <td scope="col">Title</td>
	  <td scope="col">A</td>
      <td scope="col">B</td>
	  <td scope="col">C</td>
	  <td scope="col">D</td>
	  <td scope="col">E</td>  
    </tr>
  </thead>
  <tbody>
   <?php $sn_count = 1;
   for ($i = 0; $i < count($dispositions); $i++):  ?>
    <tr>
	  <td><?php htmlout($sn_count); ?></td>
	  <input type="hidden" name = "dispositions[]" value="<?php htmlout($dispositions[$i]['id']); ?>" />
      <td><?php htmlout($dispositions[$i]['title']); ?></td>
      <?php for ($j = 1; $j < 6; $j++): ?>
            <td><input type="checkbox" 
              name="dgrades[]" id=grade<?php echo $j; ?> 
			  value="<?php htmlout($j); ?>" <?php
              if ($j == $dgrades[$i])
              {
                echo 'checked';
              }
              ?>></td> 
			<?php endfor; ?>
	</tr>
  <?php $sn_count++; endfor; ?>
         </tbody>
       </table>
			</div>
		</div>
		<div class="report-lower">
			<div class="comment-title">Class Teacher's Comment:</div>
			<div class="comment-sign">Signature & Date:</div>
			<div class="comment-title">Principal's Comment:</div>
			<div class="comment-sign">Signature & Date:</div>
		</div>
		<H4><?php echo date('Y-m-d H:i:s', strtotime('-1 hour'));?></H4>
		</div>