var room = 1;

function education_fields() {

    room++;
    var objTo = document.getElementById('education_fields')
    var divtest = document.createElement("div");
    divtest.setAttribute("class", "form-group removeclass" + room);
    var rdiv = 'removeclass' + room;

    divtest.innerHTML = '<div id="education_fields"></div><div class="row"><div class="col-sm-6 nopadding"><div class="form-group"><input type="text" class="form-control" id="car_number" name="car_num[]"  placeholder="Enter Car Number"></div></div><div class="col-sm-6 nopadding"><div class="form-group"><div class="input-group"><input type="text" class="form-control" id="car_code" name="code_number[]" value="" placeholder="Enter Code Number"><div class="input-group-append"><button class="btn btn-danger" type="button" onclick="remove_education_fields(' + room + ');"> <i class="fa fa-minus"></i> </button></div></div></div></div></div>'
    
    objTo.appendChild(divtest)
}

function remove_education_fields(rid) {
    $('.removeclass' + rid).remove();
}

