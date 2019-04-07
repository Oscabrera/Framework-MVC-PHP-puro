<input type="hidden" name="cue" id="cue"  value="<?=isset($cue)? $cue:''?>"/>
<input type="hidden" name="cond" id="cond"  value="<?=isset($cond)? $cond:''?>"/>

<script>
var table=null;
 </script>
<link href="http://<?=$_SERVER['HTTP_HOST']?>/resource/css/jquery.dataTables.min.css" rel="stylesheet"/>
<script src="http://<?=$_SERVER['HTTP_HOST']?>/resource/js/jquery.dataTables.min.js"></script>
<script src="http://<?=$_SERVER['HTTP_HOST']?>/resource/js/Datostable.js?V=1.0.0.<?=rand()?>"></script>
