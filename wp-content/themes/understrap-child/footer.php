<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'understrap_container_type' );
?>

<?php get_template_part( 'sidebar-templates/sidebar', 'footerfull' ); ?>

	<div class="wrapper" id="wrapper-footer">
		<footer class="site-footer">
			<div class="container-fluid cifras"><?php echo do_shortcode('[Awesome_visitor_counter]'); ?></div>
			<div class="<?php echo esc_attr( $container ); ?>">
				<div class="row f-azul blanco pt-3 pb-3 justify-content-center">
					<div class="col-md-10">
						<ul class="mapa-sitio">
							<li class="titulo ip-hover">IP: <?php echo do_shortcode('[direccion_ip]'); ?></li>
						</ul>
						<style>
							.ip-hover {
								background: #81C43B;
								display: flex;
								justify-content: center;
								font-size: 1.5rem !important;
							}
						</style>
					</div>
					
					<div class="col-md-12"></div>
					<div class="col-md-2">
						<ul class="mapa-sitio">
							<li><a title="Home" href="<?php echo get_home_url(); ?>">Home</a></li>
							<li><a href="<?php echo get_home_url(); ?>/covid-19/">Covid-19</a></li>
							<li><a href="<?php echo get_home_url(); ?>/it-salud-ips/">IT Salud IPS</a></li>
							<li><a target="_blank" href="https://sgi.almeraim.com/sgi/index.php?conid=sgicpo">Mesa de Servicio</a></li>
							<li><a target="_blank" href="https://t.almeraim.com/event?data=eyJjb25uZWN0aW9uIjoic2dpY3BvIiwiYXBpa2V5IjoiNzhGNTg2NjlDODU3QjMzRkEyMkFFM0E2NDdENDQiLCJlbmRwb2ludCI6Imh0dHBzJTNBJTJGJTJGc2dpLmFsbWVyYWltLmNvbSUyRnNnaSUyRmFwaSUyRnYyJTJGIn0=">Seguridad del paciente</a></li>
							<li><a href="<?php echo get_home_url(); ?>/alertas-sanitarias/">Alertas sanitarias</a></li>
							<li><a href="<?php echo get_home_url(); ?>/fichas-de-notificacion-epidemiologica/">Fichas de Notificación</a></li>
							<li><a href="<?php echo get_home_url(); ?>/polinotas">Polinotas</a></li>
							<li><hr></li>
							
							<li class="titulo">Acceso rápido</li>
							<li><a target="_blank" href="http://srvpbibog01/reports/powerbi/CPO/Tablero%20ISU%20INSTITUCIONAL_RC">ISU</a></li>
							<!--<li><a target="_blank" href="http://srvshpbog01/sites/BIST/INFORMESREPORTES3G/_layouts/ReportServer/RSViewerPage.aspx?rv:RelativeReportUrl=/sites/BIST/INFORMESREPORTES3G/CPO/Reportes%20Puntuales/Informe%20Satisfacci%C3%B3n%20Del%20Usuario.rdl&Source=http%3A%2F%2Fsrvshpbog01%2Fsites%2FBIST%2FINFORMESREPORTES3G%2FCPO%2FForms%2FAllItems%2Easpx%3FRootFolder%3D%252Fsites%252FBIST%252FINFORMESREPORTES3G%252FCPO%252FReportes%2520Puntuales%26FolderCTID%3D0x01200042D3665F12226944992CDD621A790F66%26View%3D%7BAE937189-C980-4044-9E9F-B4D628025C62%7D%26InitialTabId%3DRibbon%252EDocument%26VisibilityContext%3DWSSTabPersistence&DefaultItemOpen=1">ISU</a></li>-->
							<li><a href="<?php echo get_home_url(); ?>/comunicaciones/">Comunicaciones Poli</a></li>
							<li><a target="_blank" href="https://mail.cpo.com.co/">Correo institucional Zimbra</a></li>
							<li><a target="_blank" href="https://nuevaintranet:446/multimedia/Documentos/Directorio/DIRECTORIO_2025.pdf">Directorio telefónico</a></li>
							<li><a href="<?php echo get_home_url(); ?>/galeria-multimedia/">Galería Multimedia</a></li>
							<li><a target="_blank" href="https://transaccional.saludtotal.com.co/Sarlaft/Login.aspx">SARLAFT</a></li>
							<li><hr></li>

							<li><a href="https://nuevaintranet:446/multimedia/Documentos/CRONOGRAMA%20DE%20MANTENIMIENTO%20PREVENTIVO%20DE%20EQUIPOS%20INDUSTRIALES.xlsm" download>Cronograma Mant. Equipos Industriales 2026</a></li>
							<li><a href="https://nuevaintranet:446/multimedia/Documentos/CRONOGRAMA%20MANTENIMIENTO%20PREVENTIVO%20INFRAESTRUCTURA%20FISICA.xlsx" download>Cronograma Mant. Infraestructura Física 2026</a></li>
							<li><a href="https://nuevaintranet:446/multimedia/Documentos/GIB-FT-0972_CUADRO_DE_MANDO_INTEGRAL_2025.xlsx">Cronograma Biomédica</a></li>
							<li><a href="https://nuevaintranet:446/multimedia/Documentos/GSI-FT-1522-CRONOGRAMA_DE_MANTENIMIENTO_PREVENTIVO_2025.xlsx">Cronograma Sistemas</a></li>
							<!--<li><a href="https://nuevaintranet:446/multimedia/Documentos/GSIFT1522_Cronograma_mantenimiento_Febrero_2025.xlsx">Cronograma Sistemas</a></li>-->
							<!--<li><a target="_blank" href="http://nuevaintranet/intranet/wp-content/uploads/2023/01/Cronograma-Mantenimientos-Preventivos-Sedes2023.pdf">Cronograma Sis. Sedes</a></li>-->
						</ul>
					</div>

					<div class="col-md-2">
						<ul class="mapa-sitio">
							<li class="titulo">Talento humano</li>
							<li><a href="<?php echo get_home_url(); ?>/bienestar">Bienestar</a></li>
							<li><a href="<?php echo get_home_url(); ?>/buzon-interno-efr/">Buzón interno efr</a></li>
							<li><a target="_blank" href="https://smartpeople.medicallth.com/webkactus/frmLogin.aspx">Kactus Self Service</a></li>
							<li><a target="_blank" href="http://unitotal.com.co/">Campus UNITOTAL</a></li>
							<!--<li><a target="_blank" href="http://nuevaintranet/consulta_biometrico/">Reporte Biometrico</a></li>-->
							<li><a href="http://nuevaintranet/intranet/charlas-virtuales-cpo/">Charlas Virtuales CPO</a></li>
							<li><hr></li>
							
							<li><a href="<?php echo get_home_url(); ?>/calendario/">Calendario de actividades</a></li>
							<li><hr></li>
							
							<li class="titulo">Nuestra institución</li>
							<li><a href="<?php echo get_home_url(); ?>/palabras-de-la-direccion-general/">Palabras de la Dirección General</a></li>
							<li><a href="<?php echo get_home_url(); ?>/mision-y-vision/">Misión y Visión</a></li>
							<li><a target="_blank" rel="noopener noreferrer" href="<?php echo get_home_url(); ?>/wp-content/uploads/2021/01/derechosydeberes-web.pdf" >Derechos y Deberes</a></li>
							<li><a href="<?php echo get_home_url(); ?>/politicas-institucionales/" >Políticas Institucionales</a></li>
							<li><a target="_blank" href="https://nuevaintranet:446/multimedia/Documentos/DI-0197.pdf">Código del Buen Gobierno</a></li>
							<li><a href="<?php echo get_home_url(); ?>/nuestra-trayectoria/" >Nuestra trayectoria</a></li>
							<li><a href="<?php echo get_home_url(); ?>/plataforma-estrategica/" >Plataforma Estratégica</a></li>
							<li><a href="<?php echo get_home_url(); ?>/reconocimientos-y-premios/" >Reconocimientos y premios</a></li>
							<li><a href="<?php echo get_home_url(); ?>/informe-de-sostenibilidad-gri/" >Informe de sostenibilidad GRI</a></li>
							<li><hr></li>
							
							<li class="titulo">Gestión del mejoramiento</li>
							<li><a target="_blank" href="https://sgi.almeraim.com/sgi/index.php?conid=sgicpo">ALMERA</a></li>
							<li><a href="https://nuevaintranet/intranet/redme/">REDME</a></li>
							<li><a target="_blank" href="https://nuevaintranet:446/multimedia/fuentesMejora/FUENTES_MEJORA.pdf">Resultados Fuentes de Mejora CPO</a></li>
							<li><a href="https://nuevaintranet/intranet/politica-de-calidad/">Sistema Integrado de Gestión de Calidad</a></li>
							<li><a href="https://nuevaintranet/intranet/folletos-polifestival/">Folletos Polifestival 2024</a></li>
							<li><a href="https://nuevaintranet/intranet/estadisticas-institucionales-power-bi/">Estadísticas Institucionales Power BI</a></li>
						</ul>
					</div>

					<div class="col-md-2">
						<ul class="mapa-sitio">
							<li class="titulo">Aplicativos administrativos</li>
							<!--<li><a target="_blank" href="http://aplicativos:8080/fac/fact/facturacion/facturacion.html">Facturación</a></li>-->
							<!--<li><a target="_blank" href="http://nuevaintranet:8080/prueba2/buscaCedula.jsp">Escáner de documentos</a></li>-->
							<li><a target="_blank" href="https://hercules.sispro.gov.co/SecurityWeb2/IngresoAdmin.aspx">Administración usuarios RF</a></li>
							<li><a target="_blank" href="http://totalinfo/ConsultaHomologadorCUPS/Contenido/Consultar.aspx?EnvDato=1">Homologador CUPS</a></li>
							<li><a target="_blank" href="http://serviciosadm/Enlace">Enlace</a></li>
							<li><a target="_blank" href="https://web.yammer.com/main/feed">Yammer</a></li>
							<li><a target="_blank" href="https://swcontratos.cpo.com.co/prod/cpoadm/sense/landing.aspx">DocManager</a></li>
							<li><a target="_blank" href="https://outlook.office365.com/mail/">Outlook</a></li>
							<li><a target="_blank" href="https://www.xcustomer360app.com/st4g">Xcustomer</a></li>
							<li><a target="_blank" href="https://www.asignacioncitascpo.com.co/usuarios/login">DonDoctor</a></li>
							<li><a target="_blank" href="https://app.powerbi.com/reportEmbed?reportId=e5a28e10-287c-4b2e-9523-3fc2d3cc7f97&autoAuth=true&ctid=4a3793ae-e340-4d8d-8703-4ec2b0b58609">Subsistema Riesgo Actuarial</a></li>
							<!--<li><a target="_blank" href="https://nuevaintranet/actuarial_2.0/">Riesgo Actuarial</a></li>-->
							<li><a target="_blank" href="http://10.10.105.10:3001/custodia-info">Custodia Información CPO</a></li>
							<li><a target="_blank" href="http://totalinfo/MyFactura/login">Facturación Electrónica</a></li>
							<li><hr></li>
							
							<li><a href="<?php echo get_home_url(); ?>/tutoriales/">Tutoriales</a></li>
						</ul>
					</div>

					<div class="col-md-2">
						<ul class="mapa-sitio">
							<li class="titulo">Aplicativos asistenciales</li>
							<li><a href="https://nuevaintranet/intranet/antes-de-diligencia-el-formato-ruaf-tenga-en-cuenta/">Ruaf web</a></li>
							<li><a href="http://nuevaintranet/intranet/fichas-de-notificacion-epidemiologica/">Fichas de notificación Epidemiologica</a></li>
							<li><a target="_blank" href="http://10.10.74.11/portal/login.aspx">Carestream Virrey Solis</a></li>
							<li><a target="_blank" href="https://laboratorio.cpo.com.co:8800">Exámenes de laboratorio</a></li>
							<li><a target="_blank" href="https://stvirtual.saludtotal.com.co/vpn/index.html">Citrix Salud Total</a></li>
							<li><a target="_blank" href="https://laboratorio.cpo.com.co:8800">Laboratorios críticos</a></li>
							<li><a target="_blank" href="https://www.entregaresultados.net/WebsiteResultados/PortalIdime/index.php?tipo=Empresa&Itemid=602">Resultados Idime</a></li>
							<li><a href="http://nuevaintranet/intranet/prescripcion-no-pbs/">Prescripción NO PBS</a></li>
							<li><a target="_blank" href="https://10.10.15.81:8443/MediWorksLightWeb/login">Medilab</a></li>
							<li><a target="_blank" href="https://resultadosdx.clinicanogales.com/MediWorksLightWeb/login">Medilab Nogales</a></li>
							<li><a target="_blank" href="https://nuevaintranet:446/multimedia/Documentos/Disponibilidad_Admisiones/Disponibilidad_2025_Julio.pdf">Disponibilidad asistencial</a></li>
							<li><a target="_blank" href="https://nuevaintranet/SbarEnfermeria.1.1/login.php">Entrega y recibo de turno enfermería</a></li>
							<li><a target="_blank" href="https://nuevaintranet/SbarMedico.1.3/login.php">Entrega y recibo de turno médicos</a></li>
							<li><a target="_blank" href="https://nuevaintranet/SbarTerapia.1.1/">Entrega y recibo de turno Terapia y Rehabilitación</a></li>
							<li><a target="_blank" href="http://imagenesdiagnosticas.cpo.com.co:8080/Mediweb/login">Examenes Antiguos</a></li>
							<li><a target="_blank" href="https://10.10.105.14:8443/MediWorksLightWebLumen/login">Cosultas Antes de Contingencia</a></li>
							<li><a target="_blank" href="https://clinicanogales.qhorte.com">Laboratorios Patologías Nogales</a></li>
							<li><a target="_blank" href="https://resultadosdeimagenes.imexhs.com/">Imexhs – Aquila</a></li>
							<li><a target="_blank" href="http://10.10.105.20:8080/InfMedilab/">Inf. Imágenes diagnósticas Medilab Despues</a></li>
							<li><a target="_blank" href="http://10.10.105.20:8080/InfMedilab_copia/">Inf. Imágenes diagnósticas Medilab Antes</a></li>
							<li><a target="_blank" href="https://nuevaintranet/Stickers/">Generador Stickers</a></li>
							<li><a href="https://nuevaintranet/intranet/boletin-farmaceutico/">Boletín Farmaceútico</a></li>
							<li><a target="_blank" href="https://cpolaya-my.sharepoint.com/:x:/g/personal/coorbiomedica_cpolaya_com_co/EdzWq6Gbav5NqXX3xkahWlkBSycFN5A5g4ZwDS5HPjKPXw?e=OcqgC3">Biomedica</a></li>
							<li><a target="_blank" href="https://latam.sdxsohealth.com/">Monitoreo de Dietas</a></li>
							<li><a target="_blank" href="https://imgvs.virreysolisips.com.co:5021/login">Imexhs-Virrey Solis</a></li>
							<li><hr></li>
							
							<li><a target="_blank" href="https://web.yammer.com/main/feed"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/yamer-icon.svg" alt="" style="height:24px; width:24px;"></a> <a target="_blank" href="https://web.yammer.com/main/feed">Yammer</a></li>
						</ul>
					</div>

					<div class="col-md-2"><img src="<?php echo get_stylesheet_directory_uri();?>/img/logos_footer_intranet.png" alt=""></div>
					<!--<div class="col-md-2"><img src="http://nuevaintranet/intranet/wp-content/uploads/2024/03/Reconocimiento-03.png" alt=""></div>-->
					
					<div class="col-md-12"></div><!--col end -->
				</div><!-- row end -->
				
				<div class="row">
					<div class="col-md-12 text-center f-verde blanco pt-1 pb-1">
						<small>Carrera 20 # 23-23 sur, barrio Olaya - Bogotá Colombia | PBX: 361 2888 | <a target="_blank" href="https://www.cpo.com.co/cpo/">www.cpo.com.co</a></small>
					</div>
				</div>
			</div><!-- container end -->
		</footer>
	</div><!-- wrapper end -->
</div><!-- #page we need this extra closing tag here -->

<script type="text/javascript">
jQuery(document).ready(function($) {
    // Code that uses jQuery's $ can follow here.
    // jQuery code

	///////////////// fixed menu on scroll for desctop
    if ($(window).width() > 992) {

        var navbar_height =  $('.navbar').outerHeight();

        $(window).scroll(function(){
            if ($(this).scrollTop() > 300) {
				 $('.navbar-wrap').css('height', navbar_height + 'px');
                 $('#main-nav').addClass("fixed-top");

            }else{
                $('#main-nav').removeClass("fixed-top");
                $('.navbar-wrap').css('height', 'auto');
            }
        });
    } // end if


});

</script>

<?php wp_footer(); ?>

</body>

</html>
