<section class="seccion-btn-group3">
    <form>
                     <div class="btn-group3" role="group" aria-label="Basic radio toggle button group3">
            
                    <input type="radio" class="btn-check" name="group" id="btnradio11" autocomplete="off" checked>
                    <label class="btn btn-outline-primary" for="btnradio11" onclick="showSection3('Anos_depositos')">Años</label> 
                                
                    <input type="radio" class="btn-check" name="group" id="btnradio12" autocomplete="off">
                    <label class="btn btn-outline-primary" for="btnradio12" onclick="showSection3('Meses_depositos')">Meses</label>
            
                    <input type="radio" class="btn-check" name="group" id="btnradio113" autocomplete="off">
                    <label class="btn btn-outline-primary" for="btnradio13" onclick="showSection3('Dias_depositos')">Dias</label>
                    </div> 
    </form>
</section>
        <section id="Anos_depositos" class="info-section3" >
                <?php include 'Inf_depositos/depositos_años.html';?> 
        </section>
        <section id="Meses_depositos" class="info-section3"style="display:none;">
                <?php include 'Inf_depositos/depositos_meses.html';?>
        </section>
        <section id="Dias_depositos" class="info-section3" style="display:none;">
                <?php include 'Inf_depositos/depositos_dias.html';?>
        </section>
 <script>
    // Mostrar los botones secundarios (Grupo 3)
    function showGroup3() {
        var group3 = document.getElementById('group3');
        group3.style.display = 'block';
    }

    // Mostrar la sección seleccionada
    function showSection3(sectionId) {
        // Ocultar todas las secciones
        var sections = document.querySelectorAll('.info-section3');
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