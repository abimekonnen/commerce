var loadFile = function(event,outputName,imageDivInput,image_cancell_div){
    var test = image_cancell_div;
    var output = document.getElementById(outputName);
    var image= document.getElementById(imageDivInput);
    var image_cancell_div = document.getElementById(image_cancell_div);
    output.src =URL.createObjectURL(event.target.files[0]);
    image.className = "col-md-3"
    output.style.visibility = 'visible';
    image_cancell_div.style.visibility = 'visible';
    output.onload = function() {
            output.style.visiblity ='hidden';
            URL.revokeObjectURL(output.src) // free memory
     }
};

function cancellImage(divBtnId,btnId,fileDivId,imageId,fileID){
    var divBtnId = document.getElementById(divBtnId);
    var btnId = document.getElementById(btnId);
    var fileDivId = document.getElementById(fileDivId);
    var imageId = document.getElementById(imageId);
    var fileID = document.getElementById(fileID);
    imageId.style.visibility = 'hidden';
    divBtnId.style.visibility = 'hidden';
    fileID.value = "";
    imageId.src = "";
    fileDivId.className = "col-md-8"
}