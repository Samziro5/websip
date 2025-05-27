<section class="seccion-btn-group2">
    <form>
                     <div class="btn-group2" role="group" aria-label="Basic radio toggle button group3">
            
                    <input type="radio" class="btn-check" name="group" id="btnradio8" autocomplete="off" checked>
                    <label class="btn btn-outline-primary" for="btnradio8" onclick="showSection3('Anos_fotoscivicas')">Años</label> 
                                
                    <input type="radio" class="btn-check" name="group" id="btnradio9" autocomplete="off">
                    <label class="btn btn-outline-primary" for="btnradio9" onclick="showSection3('Meses_fotoscivicas')">Meses</label>
            
                    <input type="radio" class="btn-check" name="group" id="btnradio10" autocomplete="off">
                    <label class="btn btn-outline-primary" for="btnradio10" onclick="showSection3('Dias_fotoscivicas')">Dias</label>
                    </div> 
    </form>
</section>
        <section id="Anos_fotoscivicas" class="info-section3" >
                <?php include 'Inf_civicas/fotos_civicas_años.html';?> 
        </section>
        <section id="Meses_fotoscivicas" class="info-section3"style="display:none;">
                <?php include 'Inf_civicas/fotos_civicas_meses.html';?>
        </section>
        <section id="Dias_fotoscivicas" class="info-section3" style="display:none;">
                <?php include 'Inf_civicas/fotos_civicas_dias.html';?>
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