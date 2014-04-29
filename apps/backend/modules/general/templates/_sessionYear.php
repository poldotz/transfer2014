<?php
/**
 * Created by PhpStorm.
 * User: poldotz
 * Date: 2014/04
 * Time: 12.26
 */
?>
    <?php echo form_tag('general/changeSessionYear',array('method'=>'post')); ?>
    <a href="Javascript::Void(0)">Anno:<?php echo $form['year']->render() ?>
    </a>
    </form>

<script type="text/javascript">
    $('#session_year_year').on("change",function(e){
        e.preventDefault();
        var selectField = $(this);
        bootbox.confirm("Vuoi veramente modificare l'anno di caricamento delle prenotazioni?", function(result) {
            if(result){
                selectField.parents('form').submit();
            }
        });
    });
</script>