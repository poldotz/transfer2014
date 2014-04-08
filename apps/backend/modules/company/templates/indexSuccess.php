<?php include_partial('global/configuration_navbar'); ?>
<div class="main-container">
    <?php include_stylesheets_for_form($companyForm) ?>
    <?php include_javascripts_for_form($companyForm) ?>

    <?php echo form_tag_for($companyForm, '@company') ?>
    <table id="job_form">
        <tfoot>
        <tr>
            <td colspan="2">
                <input type="submit" value="Salva" />
            </td>
        </tr>
        </tfoot>
        <tbody>
        <?php echo $companyForm ?>
        </tbody>
    </table>
    </form>
</div>
