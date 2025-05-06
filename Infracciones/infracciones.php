<section class="seccion-btn-group2">
    <form>
       
                    <div class="btn-group2" role="group" aria-label="Basic radio toggle button group2">
            
                    <input type="radio" class="btn-check" name="group" id="btnradio5" autocomplete="off" checked>
                    <label class="btn btn-outline-primary" for="btnradio5" onclick="showSection2('Anos')">Años</label> 
                                
                    <input type="radio" class="btn-check" name="group" id="btnradio6" autocomplete="off">
                    <label class="btn btn-outline-primary" for="btnradio6" onclick="showSection2('Meses')">Meses</label>
            
                    <input type="radio" class="btn-check" name="group" id="btnradio7" autocomplete="off">
                    <label class="btn btn-outline-primary" for="btnradio7" onclick="showSection2('Dias')">Dias</label>
                    </div> 
      
    </form>
</section>


        <section id="Anos" class="info-section2" >
                <?php include 'inf_ano.html';?> 
        </section>
        <section id="Meses" class="info-section2"style="display:none;">
                <?php include 'inf_mes.html';?>
        </section>
        <section id="Dias" class="info-section2" style="display:none;">
                <?php include 'inf_dias.html';?>
        </section>

 <script>
    // Mostrar los botones secundarios (Grupo 2)
    function showGroup2() {
        var group2 = document.getElementById('group2');
        group2.style.display = 'block';
    }

    // Mostrar la sección seleccionada
    function showSection2(sectionId) {
        // Ocultar todas las secciones
        var sections = document.querySelectorAll('.info-section2');
        sections.forEach(function(section) {
            section.style.display = 'none';
        });

        // Mostrar la sección seleccionada
        var selectedSection = document.getElementById(sectionId);
        if (selectedSection) {
            selectedSection.style.display = 'block';
        }
    }
    </script> 
    

                <!-- Medidas del Grafico width="100%" height="1100"  -->