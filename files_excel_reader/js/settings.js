$(document).ready(function() {

 if (typeof FileActions !== 'undefined') {

  FileActions.register('application/msexcel', 'EditXLS', OC.PERMISSION_READ, '', function(filename) {
   if(FileActions.getCurrentMimeType() == 'application/msexcel') {
    openExcelReader($('#dir').val(),filename);
   }
  });
  FileActions.setDefault('application/msexcel','EditXLS');
  } 

});

function openExcelReader(dir,filename){
 //Start Editor
 $("#editor").hide();
 $('#content table').hide();
 $("#controls").hide();
 var editor = OC.linkTo('files_excel_reader', 'index.php')+'?dir='+dir+'&filename='+filename;
 $("#content").html('<iframe style="width:100%;height:95%;" src="'+editor+'" />');
}
