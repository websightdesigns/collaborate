<ul id="menu">
	<li><button onclick="TogetherJS(this); return false;">Collaborate</button></li>
	<li>
		<select id="theme">
			<optgroup label="Bright">
				<option value="ace/theme/chrome">Chrome</option>
				<option value="ace/theme/clouds">Clouds</option>
				<option value="ace/theme/crimson_editor">Crimson Editor</option>
				<option value="ace/theme/dawn">Dawn</option>
				<option value="ace/theme/dreamweaver">Dreamweaver</option>
				<option value="ace/theme/eclipse">Eclipse</option>
				<option value="ace/theme/github">GitHub</option>
				<option value="ace/theme/solarized_light">Solarized Light</option>
				<option value="ace/theme/textmate">TextMate</option>
				<option value="ace/theme/tomorrow">Tomorrow</option>
				<option value="ace/theme/xcode">XCode</option>
			</optgroup>
			<optgroup label="Dark">
				<option value="ace/theme/ambiance">Ambiance</option>
				<option value="ace/theme/chaos">Chaos</option>
				<option value="ace/theme/clouds_midnight">Clouds Midnight</option>
				<option value="ace/theme/cobalt">Cobalt</option>
				<option value="ace/theme/idle_fingers">idleFingers</option>
				<option value="ace/theme/kr_theme">krTheme</option>
				<option value="ace/theme/merbivore">Merbivore</option>
				<option value="ace/theme/merbivore_soft">Merbivore Soft</option>
				<option value="ace/theme/mono_industrial">Mono Industrial</option>
				<option value="ace/theme/monokai">Monokai</option>
				<option value="ace/theme/pastel_on_dark">Pastel on dark</option>
				<option value="ace/theme/solarized_dark">Solarized Dark</option>
				<option value="ace/theme/terminal">Terminal</option>
				<option value="ace/theme/tomorrow_night" selected="selected">Tomorrow Night</option>
				<option value="ace/theme/tomorrow_night_blue">Tomorrow Night Blue</option>
				<option value="ace/theme/tomorrow_night_bright">Tomorrow Night Bright</option>
				<option value="ace/theme/tomorrow_night_eighties">Tomorrow Night 80s</option>
				<option value="ace/theme/twilight">Twilight</option>
				<option value="ace/theme/vibrant_ink">Vibrant Ink</option>
			</optgroup>
		</select>
	</li>
	<li>
		<?php
			echo '<select id="mode">'."\n";
			foreach($langs AS $key => $lang) {
				$testext = ".".$curext;
				$thisext = getLanguageExtension($key, $lang_exts);
				echo '			<option value="'.$key.'"';
				if($thisext == $testext) echo ' selected="selected"';
				echo '>'.$lang.'</option>'."\n";
			}
			echo '		</select>'."\n";
		?>
	</li>
	<li>
		<select id="fontsize">
			<option value="10px">10px</option>
			<option value="11px">11px</option>
			<option value="12px" selected="selected">12px</option>
			<option value="13px">13px</option>
			<option value="14px">14px</option>
			<option value="16px">16px</option>
			<option value="18px">18px</option>
			<option value="20px">20px</option>
			<option value="24px">24px</option>
		</select>
	</li>
</ul>
<div id="fileselect">
	<form id="fileselectform" name="newfileform" method="get" action="<?php echo $_SERVER['SCRIPT_NAME']; ?>">
		<select id="filename" name="filename" data-placeholder="Choose a File..." class="chosen" style="width:350px;" tabindex="1" autofocus>
			<?php
				if($link) {
					$sql = "SELECT id, filename FROM " . $mysqltbl . " ORDER BY updated DESC";
					$query = mysql_query($sql) or die(mysql_error() . ' [menu.php]');
					$numrows = mysql_num_rows($query);
					if($numrows):
						$i = 0;
						while(list($id, $filename) = mysql_fetch_row($query)) {
							echo '<option';
							if( $i == 0 && !isset($_GET['filename']) ) {
								echo ' selected="selected"';
							}
							if( isset($_GET['filename']) && $_GET['filename'] && $_GET['filename'] == $filename ) {
								echo ' selected="selected"';
							}
							echo ' value="'.$filename.'">'.$filename.'</option>';
							$i++;
						}
					else:
						echo '<option value="default.txt">default.txt</option>';
					endif;
				}
			?>
			<option value="addnewfile">Add a New File</option>
		</select>
	</form>
	<form id="newfileform" name="newfileform" method="post" action="newfile.php">
		<input type="text" id="newfilename" name="newfilename" size="35" tabindex="2">
		<input type="submit" value="&rarr;">
	</form>
	<a href="settings.php" id="settingslink">
		<img src="settings-icon.png" alt="Settings">
	</a>
</div>
