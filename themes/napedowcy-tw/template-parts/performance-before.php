<div class="site-performance__description-content" data-performanceBefore>
    <div>
        <h3>Mosty</h3>
        <table>
            <tr>
                <td>1.</td>
                <th><?php if(get_field('light_ramp_1')) the_field('light_ramp_1'); else echo '8.70'; ?></th>
            </tr>
            <tr>
                <td>2.</td>
                <th><?php if(get_field('light_ramp_2')) the_field('light_ramp_2'); else echo '14.00'; ?></th>
            </tr>
            <tr>
                <td>3.</td>
                <th><?php if(get_field('light_ramp_3')) the_field('light_ramp_3'); else echo '14.00'; ?></th>
            </tr>
            <tr>
                <td>4.</td>
                <th><?php if(get_field('light_ramp_4')) the_field('light_ramp_4'); else echo '14.00'; ?></th>
            </tr>
            <tr>
                <td>5.</td>
                <th><?php if(get_field('light_ramp_5')) the_field('light_ramp_5'); else echo '14.00'; ?></th>
            </tr>
            <tr>
                <td>6.</td>
                <th><?php if(get_field('light_ramp_6')) the_field('light_ramp_6'); else echo '14.00'; ?></th>
            </tr>
            <tr>
                <td>7.</td>
                <th><?php if(get_field('light_ramp_7')) the_field('light_ramp_7'); else echo '14.00'; ?></th>
            </tr>
            <tr>
                <td>8.</td>
                <th><?php if(get_field('light_ramp_8')) the_field('light_ramp_8'); else echo '14.00'; ?></th>
            </tr>
        </table>
    </div>
    <div>
        <h3>Opis spektaklu</h3>
        <p>Czas przedstawienia:
            <b><?php if(get_field('time_performance')) the_field('time_performance'); else echo '2.5 h'; ?>
            </b></p>
        <p><?php if(get_field('start_end_performance')) the_field('start_end_performance'); else echo '19.00 : 21.30';  ?>
        </p>
        <p>Przygotowanie:
            <b><?php if(get_field('people_need_prepare')) the_field('people_need_prepare'); else echo '4 osoby';  ?></b>
        </p>
        <p>Obsługa:
            <b><?php if(get_field('people_need_hendle')) the_field('people_need_hendle'); else echo '4 osoby';  ?></b>
        </p>
        <p>Rozbiórka:
            <b><?php if(get_field('people_need_demolich')) the_field('people_need_demolich'); else echo '4 osoby';  ?></b>
        </p>
    </div>
</div>
<div class="site-performance__text-content" data-performanceBefore>

</div>