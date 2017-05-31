src = "js/chartjs/Chart.js";
src = "js/chartjs/Chart.bundle.min.js";

$(document).ready(function () { 
    
     
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


    var estadistica = new Chart(duarte, {
        type: 'bar',
        data: data,

    });



