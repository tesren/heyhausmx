<?php 
$regiones = get_terms( array(
    'taxonomy'          => 'regiones',
    'parent'            => 0,
    'hide_empty'        => false,
) );

$propertiesType = get_terms( array(
    'taxonomy'          => 'property_type',
    'parent'            => 0,
    'hide_empty'        => false,
) );

get_header();?>

<div class="position-relative">
    <img src="<?php echo get_template_directory_uri();?>/assets/images/muelle-puerto-vallarta.webp" alt="Muelle de Puerto Vallarta" class="w-100" style="height:88vh; object-fit:cover;" >
    <div class="fondo-oscuro"></div>

    <div class="row position-absolute top-0 start-0 h-100 z-3 justify-content-center">
        <div class="col-12 col-lg-8 col-xl-7 align-self-center">
            <h1 class="text-center text-white text-uppercase">Encuentra la casa de tus sueños</h1>
            
            <!-- Formulario de busqueda -->
            <div class="bg-light px-3 py-4 rounded-4">
                <form action="" method="get" class="row">

                    <div class="col-12 col-lg-4">
                        <label for="regiones_s">Tipo de Propiedad</label>
                        <select class="form-select w-100" aria-label="Seleccione un área" id="regiones_s" name="regiones_s">
                            <option selected value=""><?php pll_e('Todos los tipos');?></option>
                            <?php foreach($propertiesType as &$type):?>
                                <option value="<?php echo $type->slug; ?>"><?php echo $type->name; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="col-12 col-lg-8">

                    </div>

                </form>
            </div>
            

        </div>
    </div>

</div>

<h2 class="text-center gold-text mt-5 fs-1 fw-light">Propiedades Destacadas</h2>

<?php get_footer(); ?>