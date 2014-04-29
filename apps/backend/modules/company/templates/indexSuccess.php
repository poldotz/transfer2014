<?php include_partial('global/configuration_navbar',array('selected'=>'company')); ?>
<div class="main-container">
    <?php include_stylesheets_for_form($form) ?>
    <?php include_javascripts_for_form($form) ?>
    <?php if($sf_user->hasFlash('error')): ?>
        <?php echo $sf_user->getFlash('error'); ?>
    <?php endif; ?>
    <?php echo form_tag_for($form, '@company') ?>
    <table id="job_form">
        <tfoot>
        <tr>
            <td colspan="2">
                <input type="submit" value="Salva" />
            </td>
        </tr>
        </tfoot>
        <tbody>
        <?php echo $form ?>
        </tbody>
    </table>
    </form>
</div>
