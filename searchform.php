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
) );?>

<form role="search" method="get" id="searchform" class="" action="<?php echo home_url( '/' ); ?>">

    <input type="hidden" class="form-control shadow-5" placeholder="Search" value="<?php echo get_search_query() ?>" name="s" title="Search" style="border-radius:30px;"/>

    <label for="regiones_s"><?php pll_e('Ubicación'); ?></label>
    <select class="form-select w-100 mb-3" aria-label="Default select example" id="regiones_s" name="regiones_s">
        <option selected value=""><?php pll_e('Selecciona uno');?></option>
        <?php foreach($regiones as &$category):
            $childrenTerms =  get_term_children( $category->term_id, 'regiones' );

                foreach($childrenTerms as $child) :     
                    $term = get_term_by( 'id', $child, 'regiones');?>
                    <option value="<?php echo $term->slug; ?>"><?php echo $term->name; ?></option>
                <?php endforeach; ?>

        <?php endforeach; ?>
    </select>

    <div class="row">

        <div class="col-6 ps-0">
            <label for="type_s"><?php pll_e('Tipo de propiedad');?></label>
            <select class="form-select w-100 mb-3" aria-label="Default select example" id="type_s" name="type_s">
                <option selected value=""><?php pll_e('Selecciona uno');?></option>

                <?php foreach($propertiesType as &$type):?>
                    <option value="<?php echo $type->slug; ?>"><?php echo $type->name; ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="col-6 pe-0">
            <label for="currency"><?php pll_e('Moneda');?></label>
            <select class="form-select w-100 mb-3" aria-label="Default select example" id="currency" name="currency">
                <option selected value=""><?php pll_e('Selecciona uno');?></option>
                <option value="USD">USD</option>
                <option value="MXN">MXN</option>
            </select>
        </div>

    </div>                        

    <div class="row justify-content-center mb-3">
        <label class="text-center mb-2"><?php pll_e('Rango de precios')?></label>

        <input class="col-5 col-lg-3 search-form" type="number" name="minprice" id="minprice" placeholder="Min">
        <span class="col-1 fs-4 text-center">-</span>
        <input class="col-5 col-lg-3 search-form" type="number" name="maxprice" id="maxprice" placeholder="Max">
        <div id="slider-range-precios" class="mt-2 col-11"></div>
        
    </div>

    <div class="row justify-content-center mb-4">
        <label class="text-center mb-2"><?php pll_e('Rango de Recámaras'); ?></label>
        <input class="col-5 col-lg-3 search-form" type="number" name="minbeds" id="minbeds" placeholder="Min">
        <span class="col-1 fs-4 text-center">-</span>
        <input class="col-5 col-lg-3 search-form" type="number" name="maxbeds" id="maxbeds" placeholder="Max">
        <div id="slider-range-beds" class="mt-2 col-11"></div>
    </div>

        

<button class="btn btn-blue w-100" type="submit" id="searchsubmit" value=""><?php pll_e('Buscar'); ?></button>

</form>