src = "js/chartjs/Chart.js";
src = "js/chartjs/Chart.bundle.min.js";

$(document).ready(function () { 
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        
    });
    
    var mask = function(r,e,t){
        
        if ((e.keyCode > 47 && e.keyCode < 58) || (e.keyCode < 106 && e.keyCode > 95)) {
            t.value = t.value.replace(r[0],r[1]);
            t.value = t.value.slice(0,r[2]);
            return true;
          }

        //remove all chars, except dash and digits
        t.value = t.value.replace(/[^\-0-9]/g, '');
    }
    
//    $("#cedula-prof-create").keyup((e)=>{
//        r =[/(\d{3})\-?(\d{7})\-?(\d{1})/g, '$1-$2-$3',13];
//        mask(r,e,e.target);
//    });
    var patternPhone =[/(\d{3})\-?(\d{3})\-?(\d{4})/g, '$1-$2-$3',12];
    $('input[name=PCelular]').keyup((e)=>{
        mask(patternPhone,e,e.target);
    })
    $('input[name=PTelefono]').keyup((e)=>{
        mask(patternPhone,e,e.target);
    })
function validar(){
    
    var Asignatura, Codigo, Carrera, Creditos, seccion, ciclo;
    
    Asignatura = document.getElementById("asignatura").value;
    Carrera = document.getElementById("carrera").value;
    console.log(Carrera);
    
    
    if(Carrera === ""){
        alert("no asignatura");
        return false;
    }
}  
    
    
        $("#lunes").click(function () {
            if ($(this).is(":checked")) {
                $("#lunesDe").attr("disabled", false)
                $("#lunesHasta").attr("disabled", false)
            } else {
                $("#lunesDe").attr("disabled", true)
                $("#lunesHasta").attr("disabled", true)
            }
        });

        $("#martes").click(function () {
            if ($(this).is(":checked")) {
                $("#martesDe").attr("disabled", false)
                $("#martesHasta").attr("disabled", false)
            } else {
                $("#martesDe").attr("disabled", true)
                $("#martesHasta").attr("disabled", true)
            }
        });

        $("#miercoles").click(function () {
            if ($(this).is(":checked")) {
                $("#miercolesDe").attr("disabled", false)
                $("#miercolesHasta").attr("disabled", false)
            } else {
                $("#miercolesDe").attr("disabled", true)
                $("#miercolesHasta").attr("disabled", true)
            }
        });

        $("#jueves").click(function () {
            if ($(this).is(":checked")) {
                $("#juevesDe").attr("disabled", false)
                $("#juevesHasta").attr("disabled", false)
            } else {
                $("#juevesDe").attr("disabled", true)
                $("#juevesHasta").attr("disabled", true)
            }
        });

        $("#viernes").click(function () {
            if ($(this).is(":checked")) {
                $("#viernesDe").attr("disabled", false)
                $("#viernesHasta").attr("disabled", false)
            } else {
                $("#viernesDe").attr("disabled", true)
                $("#viernesHasta").attr("disabled", true)
            }
        });

        $("#sabado").click(function () {
            if ($(this).is(":checked")) {
                $("#sabadoDe").attr("disabled", false)
                $("#sabadoHasta").attr("disabled", false)
            } else {
                $("#sabadoDe").attr("disabled", true)
                $("#sabadoHasta").attr("disabled", true)
            }


        });

        //$("#BlockLab").show();
        $("#TieneLab").click(function () {
            if ($(this).is(":checked")) {
                $("#BlockLab").show();
                //            $("#BlockLab").style.opacity=0.1;
                //            $("#12").slideUp();
                //            $("#SiTieneLab").attr("disabled", false);
                //            $("#botonLabHorario").attr("disabled", false);
                //            $("#SiTieneLab").show();
                //            $("#12").show();
            } else {
                $("#BlockLab").hide();
                //            $("#BlockLab").style.opacity=0.5;
                //            $("#12").slideDown();
                //            $("#SiTieneLab").attr("disabled", true);
                //            $("#botonLabHorario").attr("disabled", true);
                //            $("#SiTieneLab").hide();
                //            $("#12").hide();
            }
        });
    });
    var duarte = (document).getElementById("patria");

    var data = {
        labels: ["January", "February", "March", "April", "May", "June", "July"],
        datasets: [
            {
                label: "My First dataset",
                backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
                borderColor: [
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
                borderWidth: 1,
                data: [65, 59, 80, 81, 56, 55, 40],
        }
    ]
    };





