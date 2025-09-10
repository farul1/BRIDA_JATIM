function addKoma(nStr)
{
    nStr += '';
    x = nStr.split('.');
    x1 = x[0];
    x2 = x.length > 1 ? ',' + x[1] : '';
    var rgx = /(\d+)(\d{3})/;
    while (rgx.test(x1)) {
        x1 = x1.replace(rgx, '$1' + '.' + '$2');
    }
    return x1 + x2;
}

function alertKu2(tipe, judul, isi){
	var warnabtn = "#FF5722";
	if(tipe == 'success'){ warnabtn = "#4CAF50"; }
    swal({
    	html: true,
        title: judul,
        text: isi,
        confirmButtonColor: warnabtn,
        type: tipe
    });
}

function alertKu(tipe, isi){
	var warnabtn = "#FF5722";
	if(tipe == 'success'){ warnabtn = "#4CAF50"; }
    swal({
    	html: true,
        title: isi,
        text: "",
        confirmButtonColor: warnabtn,
        type: tipe
    });
}

function _(el){
    return document.getElementById(el);
}
function tgl(id){
	$(id).toggle();
}
function openModal(id){
	$(id).modal('show');
}
function openModalIndex(id){
	// alert(id);
	$(id).modal('show');
}
function closeModal(id){
	// alert(id);
	$(id).modal('hide');
}
function closeBgModal(){
	$(document.body).removeClass("modal-open");
	$(".modal-backdrop").remove();
}


function dp(str){ //fungsi buat mengganti petik ' menjadi `. untuk menghindari sql injection
	var res = str;
    var jmlN = str.search("'");
    if(jmlN > -1){
    	res = str.split("'");
    	str = "";
	    for (i = 0; i < res.length - 1; i++) {
    		str += res[i] + "`";
	    }
	    str += res[res.length-1];
	    res = str;
	    // alert(res.length);
    }
    return res;
}

function goToIndex() {
	window.location.replace("index.php");
}
