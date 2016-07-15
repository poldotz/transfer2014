<?php include_partial('global/services_navbar',array('selected'=>'booking')); ?>

<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<div class="main-container">
    <form id="booking_import_form" action="<?php echo url_for('booking/importBooking') ?>" method="post" enctype="multipart/form-data">
    <table id="job_form">
        <tfoot>
        <tr>
            <td colspan="2">
                <input type="submit" value="Importa file" />
            </td>
        </tr>
        </tfoot>
        <tbody>
        <?php echo $form ?>
        </tbody>
    </table>
    </form>
</div>