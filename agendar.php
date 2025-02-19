<!DOCTYPE html>
<html lang="es" class="no-js bootstrap">

<head>

    <link rel="stylesheet" href="css/Agendar.css">


    <link rel="preconnect" href="http://se.monetate.net" crossorigin="anonymous" />
    <link rel="preconnect" href="http://f.monetate.net" crossorigin="anonymous" />
    <link rel="preconnect" href="https://cdn-ukwest.onetrust.com" crossorigin="anonymous" />
    <link type="text/css" rel="stylesheet" href="/sites/all/themes/specsavers_bootstrap/ss_dds/css/ss-dds.compat.css"
        media="all" />
    <link type="text/css" rel="stylesheet"
        href="/sites/aui/23.04.1/bundles/pageparts/css/page-parts/2/header/ss-header.css" media="all" />
    <link type="text/css" rel="stylesheet"
        href="/sites/aui/23.04.1/bundles/pageparts/css/page-parts/2/footer/ss-footer.css" media="all" />

    <meta charset="utf-8" />
    <meta name="is-error-fallback" content="false" />
    <style>
        #customer-notes{
            resize: none;
        }
    </style>
</head>
<title>Reserva una cita en la Optica Nacional</title>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600&display=swap');
</style>





<div id="columns" class="col-xs-12">
    <div id="content-column">
        <div class="content-inner">
            <div id="main-content">
                <div class="region region-content">
                    <div class="region-inner">
                        <div id="block-system-main" class="block block-system">
                            <section class="raf">


                                <div class="raf__container">
                                    <div class="raf--intro">


                                        <h1 class="heading">Vamos a programar una cita</h1>

                                        <span class="raf__intro--store-booking">en la Óptica Nacional</span>


                                        <div class="raf__intro--copy">
                                            <div class="copy--show-read-more">
                                                <p>Solicita una cita a continuación y nos pondremos en contacto contigo
                                                    en la próxima hora para confirmar la fecha y hora más cercanas disponibles.</p>
                                            </div>


                                            <div class="mandatory-notice">
                                                Los campos marcados con * son obligatorios.
                                            </div>
                                        </div>
                                    </div>


                                    <div class="raf__wrapper">
                                        <form class="request-appointment-form" data-territory="es_es" id="raf"
                                           action="registrodecita.php" method="post" enctype="application/x-www-form-urlencoded">
                                            <div class="raf__group raf--appointment-types">
                                                <h2 class="heading">¿Qué tipo de cita necesitas?</h2>


                                                <div class="raf__form-item appointment-type">
                                                    <label class="appointment-type-label"> Examen visual para adultos
                                                        <span class="appointment-type--info">Para clientes a partir de
                                                            16 años</span>
                                                        <input type="checkbox" name="cita_adulto"
                                                            class="appointment-type-option" value="Sí"
                                                            data-focus-count="1" data-booking-type="cita_adulto">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>



                                                <div class="raf__form-item appointment-type">
                                                    <label class="appointment-type-label"> Examen visual para niños
                                                        <span class="appointment-type--info">Padre, madre o tutor deben
                                                            estar presentes</span>
                                                        <input type="checkbox" name="cita_niños"
                                                            class="appointment-type-option" value="Sí"
                                                            data-focus-count="1" data-booking-type="cita_niños">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>
                                            </div>



                                            <div class="raf__group raf__group--narrow raf--appointment-date-time">
                                                <h2 class="heading">Fecha de la cita</h2>
                                                <div class="raf__form-item form-item--text-input">
                                                    <div class="text-input-wrapper validate-text">
                                                        <input type="text" id="fecha_hora" name="fecha_hora" required>
                                                        <label for="fecha_hora">Fecha y hora*</label>
                                                    </div>
                                                    <p class="notice">Puedes darnos una fecha y hora específica (martes
                                                        a las 3:00 p.m) o un tramo más flexible (cualquier tarde la
                                                        semana que viene). Haremos todo lo que podamos para encontrar el
                                                        hueco que mejor te convenga.</p>
                                                </div>
                                            </div>





                                            <div class="raf__group raf__group--narrow raf--personal-details">
                                                <h2 class="heading">¿Para quién es la cita?</h2>
                                                <div class="raf__form-section">
                                                    <h3 class="heading">Datos personales</h3>



                                                    <div class="raf__form-item form-item--text-input">
                                                        <div class="text-input-wrapper validate-text">
                                                            <input type="text" placeholder="" required=""
                                                                data-hj-suppress="true" spellcheck="false"
                                                                autocomplete="given-name" id="nombre_cliente"
                                                                name="nombre_cliente">
                                                            <label for="nombre_cliente">Nombre*</label>
                                                        </div>
                                                    </div>



                                                    <div class="raf__form-item form-item--text-input">
                                                        <div class="text-input-wrapper validate-text">
                                                            <input type="text" placeholder="" required=""
                                                                data-hj-suppress="true" spellcheck="false"
                                                                autocomplete="family-name" id="apellido_cliente"
                                                                name="apellido_cliente">
                                                            <label for="apellido_cliente">Apellido*</label>
                                                        </div>
                                                    </div>




                                                    <div class="raf__form-item form-item--text-input">
                                                        <div class="text-input-wrapper validate-phone">
                                                            <input id="telefono_cliente" type="tel" placeholder=""
                                                                inputmode="tel" data-hj-suppress="true"
                                                                spellcheck="false" autocomplete="tel" name="telefono_cliente"
                                                                required>
                                                            <label for="telefono_cliente">Número de teléfono*</label>
                                                        </div>
                                                    </div>

                                                    <div class="raf__form-section notes--section">
                                                        <h3 class="heading">¿Algo más que deberíamos saber?</h3>
                                                        <div class="raf__form-item form-item--text-input">
                                                            <div class="text-input-wrapper">
                                                                <textarea id="info_personal"
                                                                    name="info_personal"></textarea>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="raf__group raf__group--submit">
                                                        <p class="notice">
                                                            La información personal que nos proporciones se utilizará
                                                            para reservar tu cita. Podría ser compartida con miembros
                                                            del grupo de la empresa Óptica Nacional.</a>
                                                        </p>
                                                        <button class="submit-button" type="submit">
                                                        <span class="submit-button_submit-text">Solicitar</span>

                                                        </button>
                                                    </div>
                                                </div>
                                        </form>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
                </section>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>
</div>
</div>
</section>




<script src='/sites/aui/23.04.1/bundles/specsaversproducts/js/ss-attraqt-shared.js'></script>
<link type="text/css" rel="stylesheet"
    href="/sites/aui/23.04.1/bundles/specsaversattraqtsearch/css/ss-attraqt-search-autocomplete.css" media="all">

<script type="text/plain" class="optanon-category-C0002"
    src="/sites/aui/23.04.1/bundles/specsaversattraqtsearch/js/ss-attraqt-tracking.js" defer></script>
</div>

</footer>
</div>


<script src="https://www.specsavers.es/sites/all/themes/bootstrap/js/bootstrap.js?ruua9y"></script>
<script defer src="https://static.cloudflareinsights.com/beacon.min.js/v52afc6f149f6479b8c77fa569edb01181681764108816"
    integrity="sha512-jGCTpDpBAYDGNYR5ztKt4BQPGef1P0giN6ZGVUi835kFF88FOmmn8jBQWNgrNd8g/Yu421NdgWhwQoaOPFflDw=="
    data-cf-beacon='{"rayId":"7cde6048098b8df0","token":"42cea62c46eb4822b55fef2d21a5ebda","version":"2023.4.0","si":100}'
    crossorigin="anonymous"></script>
<?php
include("registrodecita.php");
?>
</body>

</html>