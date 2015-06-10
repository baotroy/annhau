function checkFileExt(file) {
    var list_ext = ['jpg', 'jpeg', 'gif', 'png', ''];
    

    if (file.val() !== '') {
        var sFileName = file.val().toString().toLowerCase();
      
        var sFileExtension = sFileName.split('.')[sFileName.split('.').length - 1];
      

        if (jQuery.inArray(sFileExtension, list_ext) < 0) {                
            return false;
        }
       

    } 
    return true;
}