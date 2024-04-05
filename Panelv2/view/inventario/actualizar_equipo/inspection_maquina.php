<form class="form" role="form">
 <form class="form-horizontal" id="Frmregcoti" name="Frmregcoti" method="post" action="?c=inv01&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $udni; ?>&a=actualizar_inspection" >
	<div class="container inspection-equipo-container" id="inspection-equipo-container">
	  <hr/>
	  <h3>PRE-TRIP INSPECTION - MAQUINA REEFER</h3>
	  <div id="inspectionEquipoLoadMSG" style="display:none;text-align:center;">
		<strong>Cargando...</strong>
		<br>
		<img src="assets/vendor/images/spinner.gif" style="height: 85px;width: 85px;">
	  </div>
	<div class="form-group">
		<label for="inputEmail3 radio" class="col-sm-4 control-label">POWER CABLE</label>
		<div class="radio col-sm-8">
			<label for="inputEmail3" class="col-sm-2 control-label">
			<input type="radio" name="power_cable" id="optionRadio1" value="1"  <?php if ($equi_inspection->power_cable=="1") echo "checked" ?>   >
			Yes
		  </label>
		  <label for="inputEmail3" class="col-sm-2 control-label">
			<input type="radio" name="power_cable" id="optionRadio1_1" value="0" <?php if ($equi_inspection->power_cable=="0") echo "checked"; ?>  >
			No
		  </label>
			<div class="col-sm-2">
			  <input type="text" class="form-control" name="mt_power_cable" id="mt_power_cable" placeholder="Mt." value="<?php echo $equi_inspection->mt_power_cable; ?>" >
			  <input type="hidden" class="form-control" name="c_idequipo" id="c_idequipo" value="<?php echo $_GET["id"]; ?>" >
			  <input type="hidden" class="form-control" name="udni" id="udni" value="<?php echo $_GET["udni"]; ?>" >
			  <input type="hidden" class="form-control" name="cod_tipo" id="cod_tipo" value="<?php echo $_GET["cod_tipo"]; ?>" >
			</div>
		</div>
	</div>
	<div class="form-group">
		<label for="inputEmail3 radio" class="col-sm-4 control-label">PLUG OR RECEPTABLE</label>
		<div class="radio col-sm-8">
		  <label for="inputEmail3" class="col-sm-2 control-label">
			<input type="radio" name="plug_receptable" id="optionRadio2" value="1" <?php if ($equi_inspection->plug_receptable=="1") echo "checked"; ?> >
			Yes
		  </label>
		  <label for="inputEmail3" class="col-sm-2 control-label">
			<input type="radio" name="plug_receptable" id="optionRadio2_1" value="0"  <?php if ($equi_inspection->plug_receptable=="0") echo "checked"; ?> >
			No
		  </label>
			<div class="col-sm-2">
			  <input type="text" class="form-control" name="st_plug_receptable" id="st_plug_receptable" placeholder="Status" value="<?php echo $equi_inspection->st_plug_receptable?>">
			</div>
		</div>
	</div>
	<div class="form-group">
		<label for="inputEmail3 radio" class="col-sm-4 control-label">CIRCUIT BREAKER</label>
		<div class="radio col-sm-8">
		  <label for="inputEmail3" class="col-sm-2 control-label">
			<input type="radio" name="circuit_breaker" id="optionRadio3" value="1" <?php if ($equi_inspection->circuit_breaker=="1") echo "checked"; ?> >
			Yes
		  </label>
		  <label for="inputEmail3" class="col-sm-2 control-label">
			<input type="radio" name="circuit_breaker" id="optionRadio3_1" value="0" <?php if ($equi_inspection->circuit_breaker=="0") echo "checked"; ?>>
			No
		  </label>
			<div class="col-sm-2">
			  <input type="text" class="form-control" name="st_circuit_breaker" id="st_circuit_breaker" placeholder="Status" value="<?php echo $equi_inspection->st_circuit_breaker?>">
			</div>
		</div>
	</div>
	<div class="form-group">
		<label for="inputEmail3 radio" class="col-sm-4 control-label">TRANS 220/24V</label>
		<div class="radio col-sm-8">
		  <label for="inputEmail3" class="col-sm-2 control-label">
			<input type="radio" name="trans_220" id="optionRadio4" value="1" <?php if ($equi_inspection->trans_220=="1") echo "checked"; ?>>
			Yes
		  </label>
		  <label for="inputEmail3" class="col-sm-2 control-label">
			<input type="radio" name="trans_220" id="optionRadio4_1" value="0" <?php if ($equi_inspection->trans_220=="0") echo "checked"; ?>>
			No
		  </label>
			<div class="col-sm-2">
			  <input type="text" class="form-control" name="v_trans_220" id="v_trans_220" placeholder="Vol" value="<?php echo $equi_inspection->v_trans_220?>">
			</div>
			<div class="col-sm-2">
			  <input type="text" class="form-control" name="st_trans_220" id="st_trans_220" placeholder="Status" value="<?php echo $equi_inspection->st_trans_220?>">
			</div>
		</div>
	</div>
	<div class="form-group">
		<label for="inputEmail3 radio" class="col-sm-4 control-label">TRANS.440/220V/380V</label>
		<div class="radio col-sm-8">
		  <label for="inputEmail3" class="col-sm-2 control-label">
			<input type="radio" name="trans_440" id="optionRadio5" value="1" <?php if ($equi_inspection->trans_440=="1") echo "checked"; ?>>
			Yes
		  </label>
		  <label for="inputEmail3" class="col-sm-2 control-label">
			<input type="radio" name="trans_440" id="optionRadio5_1" value="0" <?php if ($equi_inspection->trans_440=="0") echo "checked"; ?>>
			No
		  </label>
			<div class="col-sm-2">
			  <input type="text" class="form-control" name="v_trans_440" id="v_trans_440" placeholder="Vol" value="<?php echo $equi_inspection->v_trans_440?>">
			</div>
			<div class="col-sm-2">
			  <input type="text" class="form-control" name="st_trans_440" id="st_trans_440" placeholder="Status" value="<?php echo $equi_inspection->st_trans_440?>">
			</div>
		</div>
	</div>
	<div class="form-group">
		<label for="inputEmail3 radio" class="col-sm-4 control-label">ELECTRIC LINE(POWER)VOL.</label>
		<div class="radio col-sm-8">
			<div class="col-sm-2">
			  <input type="text" class="form-control" name="l1v_electric_line" id="l1v_electric_line" placeholder="L1V" value="<?php echo $equi_inspection->l1v_electric_line?>">
			</div>
			<div class="col-sm-2">
			  <input type="text" class="form-control" name="l2v_electric_line" id="l2v_electric_line" placeholder="L2V" value="<?php echo $equi_inspection->l2v_electric_line?>">
			</div>
			<div class="col-sm-2">
			  <input type="text" class="form-control" name="l3v_electric_line" id="l3v_electric_line" placeholder="L3V" value="<?php echo $equi_inspection->l3v_electric_line?>">
			</div>
		</div>
	</div>
	<div class="form-group">
		<label for="inputEmail3 radio" class="col-sm-4 control-label">ELECTRIC CHARGED(POWER)VOL.</label>
		<div class="radio col-sm-8">
			<div class="col-sm-2">
			  <input type="text" class="form-control" name="l1v_electric_charged" id="l1v_electric_charged" placeholder="L1V" value="<?php echo $equi_inspection->l1v_electric_charged?>">
			</div>
			<div class="col-sm-2">
			  <input type="text" class="form-control" name="l2v_electric_charged" id="l2v_electric_charged" placeholder="L2V" value="<?php echo $equi_inspection->l2v_electric_charged?>">
			</div>
			<div class="col-sm-2">
			  <input type="text" class="form-control" name="l3v_electric_charged" id="l3v_electric_charged" placeholder="L3V" value="<?php echo $equi_inspection->l3v_electric_charged?>">
			</div>
		</div>
	</div>
	<div class="form-group">
		<label for="inputEmail3 radio" class="col-sm-4 control-label">MAIN CONTACTOR / RELAY</label>
		<div class="radio col-sm-8">
			<div class="col-sm-2">
			  <input type="text" class="form-control" name="eh_main_contactor" id="eh_main_contactor" placeholder="Evap. Hi" value="<?php echo $equi_inspection->eh_main_contactor?>">
			</div>
			<div class="col-sm-2">
			  <input type="text" class="form-control" name="el_main_contactor" id="el_main_contactor" placeholder="Evap. Low" value="<?php echo $equi_inspection->el_main_contactor?>">
			</div>
			<div class="col-sm-2">
			  <input type="text" class="form-control" name="c_main_contactor" id="c_main_contactor" placeholder="Cond." value="<?php echo $equi_inspection->c_main_contactor?>">
			</div>
			<div class="col-sm-2">
			  <input type="text" class="form-control" name="co_main_contactor" id="co_main_contactor" placeholder="Comp." value="<?php echo $equi_inspection->co_main_contactor?>">
			</div>
			<div class="col-sm-2">
			  <input type="text" class="form-control" name="h_main_contactor" id="h_main_contactor" placeholder="Heater." value="<?php echo $equi_inspection->h_main_contactor?>">
			</div>
		</div>
	</div>
	<div class="form-group">
		<label for="inputEmail3 radio" class="col-sm-4 control-label">CONTROLLER</label>
		<div class="radio col-sm-8">
		  <label for="inputEmail3" class="col-sm-2 control-label">
			<input type="radio" name="controller" id="optionRadio9" value="1" <?php if ($equi_inspection->controller=="1") echo "checked"; ?> >
			Yes
		  </label>
		  <label for="inputEmail3" class="col-sm-2 control-label">
			<input type="radio" name="controller" id="optionRadio9_1" value="0" <?php if ($equi_inspection->controller=="0") echo "checked"; ?>>
			No
		  </label>
			<div class="col-sm-2">
			  <input type="text" class="form-control" name="t_controller" id="t_controller" placeholder="Type" value="<?php echo $equi_inspection->t_controller?>">
			</div>
			<div class="col-sm-2">
			  <input type="text" class="form-control" name="s_controller" id="s_controller" placeholder="#Serie" value="<?php echo $equi_inspection->s_controller?>">
			</div>
		</div>
	</div>
	<div class="form-group">
		<label for="inputEmail3 radio" class="col-sm-4 control-label">SOFTWARE VERSION #</label>
		<div class="radio col-sm-8">
			<div class="col-sm-4">
			  <input type="text" class="form-control" name="software_version" id="software_version" placeholder="Software version" value="<?php echo $equi_inspection->software_version?>">
			</div>
		</div>
	</div>
	<div class="form-group">
		<label for="inputEmail3 radio" class="col-sm-4 control-label">CONFIG / MODEL #</label>
		<div class="radio col-sm-8">
			<div class="col-sm-4">
			  <input type="text" class="form-control" name="config" id="config" placeholder="Config / Model" value="<?php echo $equi_inspection->config?>">
			</div>			
		</div>
	</div>
	<div class="form-group">
		<label for="inputEmail3 radio" class="col-sm-4 control-label">ENSURE CONTAINER ID IS CORRECTLY IN CONTROLLER</label>
		<div class="radio col-sm-8">
		  <label for="inputEmail3" class="col-sm-2 control-label">
			<input type="radio" name="ensure" id="optionRadio12" value="1" <?php if ($equi_inspection->ensure=="1") echo "checked"; ?>>
			Yes
		  </label>
		  <label for="inputEmail3" class="col-sm-2 control-label">
			<input type="radio" name="ensure" id="optionRadio12_1" value="0" <?php if ($equi_inspection->ensure=="0") echo "checked"; ?>>
			No
		  </label>
			<div class="col-sm-2">
			  <input type="text" class="form-control" name="s_ensure" id="s_ensure" placeholder="#Serie" value="<?php echo $equi_inspection->s_ensure?>">
			</div>
		</div>
	</div>
	<div class="form-group">
		<label for="inputEmail3 radio" class="col-sm-4 control-label">BOARD RELAY</label>
		<div class="radio col-sm-8">
		  <label for="inputEmail3" class="col-sm-2 control-label">
			<input type="radio" name="board_relay" id="optionRadio13" value="1" <?php if ($equi_inspection->board_relay=="1") echo "checked"; ?>>
			Yes
		  </label>
		  <label for="inputEmail3" class="col-sm-2 control-label">
			<input type="radio" name="board_relay" id="optionRadio13_1" value="0"<?php if ($equi_inspection->board_relay=="0") echo "checked"; ?>>
			No
		  </label>
			<div class="col-sm-2">
			  <input type="text" class="form-control" name="t_boar_relay" id="t_boar_relay" placeholder="#Type" value="<?php echo $equi_inspection->t_boar_relay?>">
			</div>
			<div class="col-sm-2">
			  <input type="text" class="form-control" name="s_boar_relay" id="s_boar_relay" placeholder="#Serie" value="<?php echo $equi_inspection->s_boar_relay?>">
			</div>
		</div>
	</div>
	<div class="form-group">
		<label for="inputEmail3 radio" class="col-sm-4 control-label">AIR SENSORS T°</label>
		<div class="radio col-sm-8">
			<div class="col-sm-2">
			  <input type="text" class="form-control" name="sr_air_sensors" id="sr_air_sensors" placeholder="Suply R" value="<?php echo $equi_inspection->sr_air_sensors?>">
			</div>
			<div class="col-sm-2">
			  <input type="text" class="form-control" name="sl_air_sensors" id="sl_air_sensors" placeholder="Suply L" value="<?php echo $equi_inspection->sl_air_sensors?>">
			</div>
			<div class="col-sm-2">
			  <input type="text" class="form-control" name="r_air_sensors" id="r_air_sensors" placeholder="Return" value="<?php echo $equi_inspection->r_air_sensors?>">
			</div>
			<div class="col-sm-2">
			  <input type="text" class="form-control" name="a_air_sensors" id="a_air_sensors" placeholder="Ambiente" value="<?php echo $equi_inspection->a_air_sensors?>">
			</div>
			<div class="col-sm-2">
			  <input type="text" class="form-control" name="c_air_sensors" id="c_air_sensors" placeholder="Condenser" value="<?php echo $equi_inspection->c_air_sensors?>">
			</div>
		</div>
	</div>
	<div class="form-group">
		<label for="inputEmail3 radio" class="col-sm-4 control-label">DEFROST TERMINATE SENSOR T</label>
		<div class="radio col-sm-8">
			<div class="col-sm-2">
			  <input type="text" class="form-control" name="defrost_start" id="defrost_start" placeholder="Start" value="<?php echo $equi_inspection->defrost_start?>">
			</div>
			<div class="col-sm-2">
			  <input type="text" class="form-control" name="defrost_end" id="defrost_end" placeholder="End Defrost" value="<?php echo $equi_inspection->defrost_end?>">
			</div>
		</div>
	</div>
	<div class="form-group">
		<label for="inputEmail3 radio" class="col-sm-4 control-label">USDA T</label>
		<div class="radio col-sm-8">
			<div class="col-sm-2">
			  <input type="text" class="form-control" name="usda_1" id="usda_1" placeholder="USDA1" value="<?php echo $equi_inspection->usda_1?>">
			</div>
			<div class="col-sm-2">
			  <input type="text" class="form-control" name="usda_2" id="usda_2" placeholder="USDA2" value="<?php echo $equi_inspection->usda_2?>">
			</div>
			<div class="col-sm-2">
			  <input type="text" class="form-control" name="usda_3" id="usda_3" placeholder="USDA3" value="<?php echo $equi_inspection->usda_3?>">
			</div>
			<div class="col-sm-2">
			  <input type="text" class="form-control" name="usda_cargo" id="usda_cargo" placeholder="CARGO" value="<?php echo $equi_inspection->usda_cargo?>">
			</div>
		</div>
	</div>
	<div class="form-group">
		<label for="inputEmail3 radio" class="col-sm-4 control-label">DEFROST TIMER</label>
		<div class="radio col-sm-8">
		  <div class="col-sm-4">
			  <input type="text" class="form-control" name="defrost_timer" id="defrost_timer" placeholder="Defrost Timer" value="<?php echo $equi_inspection->defrost_timer?>">
			</div>
		</div>
	</div>
	<div class="form-group">
		<label for="inputEmail3 radio" class="col-sm-4 control-label">EVAP.FAN MOTOR 1/Ω-AMP</label>
		<div class="radio col-sm-8">
			<div class="col-sm-2">
			  <input type="text" class="form-control" name="l1a_evap_motor1" id="l1a_evap_motor1" placeholder="L1A" value="<?php echo $equi_inspection->l1a_evap_motor1?>">
			</div>
			<div class="col-sm-2">
			  <input type="text" class="form-control" name="l2a_evap_motor1" id="l2a_evap_motor1" placeholder="L2A" value="<?php echo $equi_inspection->l2a_evap_motor1?>">
			</div>
			<div class="col-sm-2">
			  <input type="text" class="form-control" name="l3a_evap_motor1" id="l3a_evap_motor1" placeholder="L3A" value="<?php echo $equi_inspection->l3a_evap_motor1?>">
			</div>
			<div class="col-sm-2">
			  <input type="text" class="form-control" name="m_evap_motor1" id="m_evap_motor1" placeholder="MΩ" value="<?php echo $equi_inspection->m_evap_motor1?>">
			</div>
		</div>
	</div>
	<div class="form-group">
		<label for="inputEmail3 radio" class="col-sm-4 control-label">EVAP.FAN MOTOR 2/Ω-AMP</label>
		<div class="radio col-sm-8">
			<div class="col-sm-2">
			  <input type="text" class="form-control" name="l1a_evap_motor2" id="l1a_evap_motor2" placeholder="L1A" value="<?php echo $equi_inspection->l1a_evap_motor2?>">
			</div>
			<div class="col-sm-2">
			  <input type="text" class="form-control" name="l2a_evap_motor2" id="l2a_evap_motor2" placeholder="L2A" value="<?php echo $equi_inspection->l2a_evap_motor2?>">
			</div>
			<div class="col-sm-2">
			  <input type="text" class="form-control" name="l3a_evap_motor2" id="l3a_evap_motor2" placeholder="L3A" value="<?php echo $equi_inspection->l3a_evap_motor2?>">
			</div>
			<div class="col-sm-2">
			  <input type="text" class="form-control" name="m_evap_motor2" id="m_evap_motor2" placeholder="MΩ" value="<?php echo $equi_inspection->m_evap_motor2?>">
			</div>
		</div>
	</div>
	<div class="form-group">
		<label for="inputEmail3 radio" class="col-sm-4 control-label">COND.FAN OR MOTOR /Ω-AMP</label>
		<div class="radio col-sm-8">
			<div class="col-sm-2">
			  <input type="text" class="form-control" name="l1a_con_fan" id="l1a_con_fan" placeholder="L1A" value="<?php echo $equi_inspection->l1a_con_fan?>">
			</div>
			<div class="col-sm-2">
			  <input type="text" class="form-control" name="l2a_con_fan" id="l2a_con_fan" placeholder="L2A" value="<?php echo $equi_inspection->l2a_con_fan?>">
			</div>
			<div class="col-sm-2">
			  <input type="text" class="form-control" name="l3a_con_fan" id="l3a_con_fan" placeholder="L3A" value="<?php echo $equi_inspection->l3a_con_fan?>">
			</div>
			<div class="col-sm-2">
			  <input type="text" class="form-control" name="m_con_fan" id="m_con_fan" placeholder="MΩ" value="<?php echo $equi_inspection->m_con_fan?>">
			</div>
		</div>
	</div>
	<div class="form-group">
		<label for="inputEmail3 radio" class="col-sm-4 control-label">COMPRESOR REFRIGERATION /Ω-AMP</label>
		<div class="radio col-sm-8">
		  <div class="col-sm-2">
			  <input type="text" class="form-control" name="l1a_compresor" id="l1a_compresor" placeholder="L1A" value="<?php echo $equi_inspection->l1a_compresor?>">
			</div>
			<div class="col-sm-2">
			  <input type="text" class="form-control" name="l2a_compresor" id="l2a_compresor" placeholder="L2A" value="<?php echo $equi_inspection->l2a_compresor?>">
			</div>
			<div class="col-sm-2">
			  <input type="text" class="form-control" name="l3a_compresor" id="l3a_compresor" placeholder="L3A" value="<?php echo $equi_inspection->l3a_compresor?>">
			</div>
			<div class="col-sm-2">
			  <input type="text" class="form-control" name="m_compresor" id="m_compresor" placeholder="MΩ" value="<?php echo $equi_inspection->m_compresor?>">
			</div>
		</div>
	</div>
	<div class="form-group">
		<label for="inputEmail3 radio" class="col-sm-4 control-label">HEATERS AMP /Ω-AMP</label>
		<div class="radio col-sm-8">
		  <div class="col-sm-2">
			  <input type="text" class="form-control" name="l1a_heater" id="l1a_heater" placeholder="L1A" value="<?php echo $equi_inspection->l1a_heater?>">
			</div>
			<div class="col-sm-2">
			  <input type="text" class="form-control" name="l2a_heater" id="l2a_heater" placeholder="L2A" value="<?php echo $equi_inspection->l2a_heater?>">
			</div>
			<div class="col-sm-2">
			  <input type="text" class="form-control" name="l3a_heater" id="l3a_heater" placeholder="L3A" value="<?php echo $equi_inspection->l3a_heater?>">
			</div>
			<div class="col-sm-2">
			  <input type="text" class="form-control" name="m_heater" id="m_heater" placeholder="MΩ" value="<?php echo $equi_inspection->m_heater?>">
			</div>
		</div>
	</div>
	<div class="form-group">
		<label for="inputEmail3 radio" class="col-sm-4 control-label">COIL CONDENSER</label>
		<div class="radio col-sm-8">
		  <label for="inputEmail3" class="col-sm-2 control-label">
			<input type="radio" name="coil_condenser" id="optionRadio23" value="1" <?php if ($equi_inspection->coil_condenser=="1") echo "checked"; ?>>
			Yes
		  </label>
		  <label for="inputEmail3" class="col-sm-2 control-label">
			<input type="radio" name="coil_condenser" id="optionRadio23_1" value="0" <?php if ($equi_inspection->coil_condenser=="0") echo "checked"; ?>>
			No
		  </label>
			<div class="col-sm-2">
			  <input type="text" class="form-control" name="st_coil_condenser" id="st_coil_condenser" placeholder="#Serie" value="<?php echo $equi_inspection->st_coil_condenser?>">
			</div>
		</div>
	</div>
	<div class="form-group">
		<label for="inputEmail3 radio" class="col-sm-4 control-label">LIQUID SOLEINOD VALVE</label>
		<div class="radio col-sm-8">
		  <label for="inputEmail3" class="col-sm-2 control-label">
			<input type="radio" name="liq_solenoid" id="optionRadio24" value="1" <?php if ($equi_inspection->liq_solenoid=="1") echo "checked"; ?>>
			Yes
		  </label>
		  <label for="inputEmail3" class="col-sm-2 control-label">
			<input type="radio" name="liq_solenoid" id="optionRadio24_1" value="0" <?php if ($equi_inspection->liq_solenoid=="0") echo "checked"; ?>>
			No
		  </label>
			<div class="col-sm-2">
			  <input type="text" class="form-control" name="st_liq_solenoid" id="st_liq_solenoid" placeholder="#Serie" value="<?php echo $equi_inspection->st_liq_solenoid?>">
			</div>
		</div>
	</div>
	<div class="form-group">
		<label for="inputEmail3 radio" class="col-sm-4 control-label">WATER CONDENSER</label>
		<div class="radio col-sm-8">
		  <label for="inputEmail3" class="col-sm-2 control-label">
			<input type="radio" name="water_condenser" id="optionRadio25" value="1" <?php if ($equi_inspection->water_condenser=="1") echo "checked"; ?>>
			Yes
		  </label>
		  <label for="inputEmail3" class="col-sm-2 control-label">
			<input type="radio" name="water_condenser" id="optionRadio25_1" value="0" <?php if ($equi_inspection->water_condenser=="0") echo "checked"; ?>>
			No
		  </label>

		  <div class="col-sm-2">
			  <input type="text" class="form-control" name="st_water_condenser" id="st_water_condenser" placeholder="#Serie" value="<?php echo $equi_inspection->st_water_condenser?>">
			</div>
		</div>
	</div>
	<div class="form-group">
		<label for="inputEmail3 radio" class="col-sm-4 control-label">MODULATION VALVE</label>
		<div class="radio col-sm-8">
		  <label for="inputEmail3" class="col-sm-2 control-label">
			<input type="radio" name="modulation_valve" id="optionRadio26" value="1" <?php if ($equi_inspection->modulation_valve=="1") echo "checked"; ?>>
			Yes
		  </label>
		  <label for="inputEmail3" class="col-sm-2 control-label">
			<input type="radio" name="modulation_valve" id="optionRadio26_1" value="0" <?php if ($equi_inspection->modulation_valve=="0") echo "checked"; ?>>
			No
		  </label>
			<div class="col-sm-2">
			  <input type="text" class="form-control" name="st_modulation_valve" id="st_modulation_valve" placeholder="#Serie" value="<?php echo $equi_inspection->st_modulation_valve?>">
			</div>
		</div>
	</div>
	<div class="form-group">
		<label for="inputEmail3 radio" class="col-sm-4 control-label">EXPANSION VALVE</label>
		<div class="radio col-sm-8">
		  <label for="inputEmail3" class="col-sm-2 control-label">
			<input type="radio" name="expansion_valve" id="optionRadio27" value="1" <?php if ($equi_inspection->expansion_valve=="1") echo "checked"; ?> >
			Yes
		  </label>
		  <label for="inputEmail3" class="col-sm-2 control-label">
			<input type="radio" name="expansion_valve" id="optionRadio27_1" value="0" <?php if ($equi_inspection->expansion_valve=="0") echo "checked"; ?> >
			No
		  </label>
			<div class="col-sm-2">
			  <input type="text" class="form-control" name="st_expansion_valve" id="st_expansion_valve" placeholder="#Serie" value="<?php echo $equi_inspection->st_expansion_valve?>">
			</div>
		</div>
	</div>
	<div class="form-group">
		<label for="inputEmail3 radio" class="col-sm-4 control-label">LEVEL REFRIGERANT</label>
		<div class="radio col-sm-8">
		  <label for="inputEmail3" class="col-sm-2 control-label">
			<input type="radio" name="level_refri" id="optionRadio28" value="1" <?php if ($equi_inspection->level_refri=="1") echo "checked"; ?>>
			Yes
		  </label>
		  <label for="inputEmail3" class="col-sm-2 control-label">
			<input type="radio" name="level_refri" id="optionRadio28_1" value="0" <?php if ($equi_inspection->level_refri=="0") echo "checked"; ?>>
			No
		  </label>
			<div class="col-sm-2">
			  <input type="text" class="form-control" name="st_level_refri" id="st_level_refri" placeholder="#Serie" value="<?php echo $equi_inspection->st_level_refri?>">
			</div>
		</div>
	</div>
	<div class="form-group">
		<label for="inputEmail3 radio" class="col-sm-4 control-label">COMPRESSOR OIL LEVEL</label>
		<div class="radio col-sm-8">
		  <label for="inputEmail3" class="col-sm-2 control-label">
			<input type="radio" name="compresor_oil" id="optionRadio29" value="1" <?php if ($equi_inspection->compresor_oil=="1") echo "checked"; ?> >
			Yes
		  </label>
		  <label for="inputEmail3" class="col-sm-2 control-label">
			<input type="radio" name="compresor_oil" id="optionRadio29_1" value="0" <?php if ($equi_inspection->compresor_oil=="0") echo "checked"; ?>>
			No
		  </label>
			<div class="col-sm-2">
			  <input type="text" class="form-control" name="st_compresor_oil" id="st_compresor_oil" placeholder="#Serie" value="<?php echo $equi_inspection->st_compresor_oil?>">
			</div> 
		</div>
	</div>
	<div class="form-group">
		<label for="inputEmail3 radio" class="col-sm-4 control-label">FILTER DRIER</label>
		<div class="radio col-sm-8">
		  <label for="inputEmail3" class="col-sm-2 control-label">
			<input type="radio" name="filter_drier" id="optionRadio30" value="1"  <?php if ($equi_inspection->filter_drier=="1") echo "checked"; ?>>
			Yes
		  </label>
		  <label for="inputEmail3" class="col-sm-2 control-label">
			<input type="radio" name="filter_drier" id="optionRadio30_1" value="0" <?php if ($equi_inspection->filter_drier=="0") echo "checked"; ?>>
			No
		  </label>
			<div class="col-sm-2">
			  <input type="text" class="form-control" name="st_filter_drier" id="st_filter_drier" placeholder="#Serie" value="<?php echo $equi_inspection->st_filter_drier?>">
			</div>
		</div>
	</div>
	<div class="form-group">
		<label for="inputEmail3 radio" class="col-sm-4 control-label">LOW PRESSURE</label>
		<div class="radio col-sm-8">
			<div class="col-sm-4">
			  <input type="text" class="form-control" name="low_pressure" id="low_pressure" placeholder="PSI" value="<?php echo $equi_inspection->low_pressure?>">
			</div>
		</div>
	</div>
	<div class="form-group">
		<label for="inputEmail3 radio" class="col-sm-4 control-label">HIGH PRESSURE</label>
		<div class="radio col-sm-8">
		  <div class="col-sm-4">
			  <input type="text" class="form-control" name="high_pressure" id="high_pressure" placeholder="PSI" value="<?php echo $equi_inspection->high_pressure?>">
			</div>
		</div>
	</div>
	<div class="form-group">
		<label for="inputEmail3 radio" class="col-sm-4 control-label">KEYPAD</label>
		<div class="radio col-sm-8">
		  <label for="inputEmail3" class="col-sm-2 control-label">
			<input type="radio" name="keypad" id="optionRadio33" value="1" <?php if ($equi_inspection->keypad=="1") echo "checked"; ?> >
			Yes
		  </label>
		  <label for="inputEmail3" class="col-sm-2 control-label">
			<input type="radio" name="keypad" id="optionRadio33_1" value="0" <?php if ($equi_inspection->keypad=="0") echo "checked"; ?>>
			No
		  </label>
			<div class="col-sm-2">
			  <input type="text" class="form-control" name="st_keypad" id="st_keypad" placeholder="Status" value="<?php echo $equi_inspection->st_keypad?>">
			</div>
		</div>
	</div>
	<div class="form-group">
		<label for="inputEmail3 radio" class="col-sm-4 control-label">HUMITY SENSOR</label>
		<div class="radio col-sm-8">
		  <label for="inputEmail3" class="col-sm-2 control-label">
			<input type="radio" name="humidity_sensor" id="humidity_sensor" value="1" <?php if ($equi_inspection->humidity_sensor=="1") echo "checked"; ?>>
			Yes
		  </label>
		  <label for="inputEmail3" class="col-sm-2 control-label">
			<input type="radio" name="humidity_sensor" id="humidity_sensor" value="0" <?php if ($equi_inspection->humidity_sensor=="0") echo "checked"; ?>>
			No
		  </label>
			<div class="col-sm-2">
			  <input type="text" class="form-control" name="st_humidity_sensor" id="st_humidity_sensor" placeholder="Status" value="<?php echo $equi_inspection->st_humidity_sensor?>">
			</div>
		</div>
	</div>
	<div class="form-group">
		<label for="inputEmail3" class="col-sm-2 control-label">Observations</label>
		<div class="col-sm-10">
		  <input type="text" class="form-control" name="observaciones" id="observaciones" placeholder="Observations" value="<?php echo $equi_inspection->observaciones?>">
		</div>
	</div>
	<div class="form-group">
		<label for="inputEmail3" class="col-sm-2 control-label">Customer</label>
		<div class="col-sm-10">
		  <input type="text" class="form-control" name="customer" id="customer" placeholder="Customer" value="<?php echo $equi_inspection->customer?>">
		</div>
	</div>
	<div class="form-group">
		<label for="inputEmail3" class="col-sm-2 control-label">Technician</label>
		<div class="col-sm-10">
		  <input type="text" class="form-control" name="technician" id="technician" placeholder="Technician" value="<?php echo $equi_inspection->technician?>">
		</div>
	</div>
	 <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="button" class="btn btn-default actualizar-inspection">Actualizar</button>
    </div>
  </div>
	</div>
</form>