<?php
	/**
	 * Languages available for syntax highlighting
	 * @var array
	 */
	$langs = array(
		'abap' => 'ABAP',
		'asciidoc' => 'AsciiDoc',
		'c9search' => 'C9Search',
		'coffee' => 'CoffeeScript',
		'coldfusion' => 'ColdFusion',
		'csharp' => 'C#',
		'css' => 'CSS',
		'curly' => 'Curly',
		'dart' => 'Dart',
		'diff' => 'Diff',
		'dot' => 'Dot',
		'ftl' => 'FreeMarker',
		'glsl' => 'Glsl',
		'golang' => 'Go',
		'groovy' => 'Groovy',
		'haxe' => 'haXe',
		'haml' => 'HAML',
		'html' => 'HTML',
		'c_cpp' => 'C/C++',
		'clojure' => 'Clojure',
		'jade' => 'Jade',
		'java' => 'Java',
		'jsp' => 'JSP',
		'javascript' => 'JavaScript',
		'json' => 'JSON',
		'jsx' => 'JSX',
		'latex' => 'LaTeX',
		'less' => 'LESS',
		'lisp' => 'Lisp',
		'scheme' => 'Scheme',
		'liquid' => 'Liquid',
		'livescript' => 'LiveScript',
		'logiql' => 'LogiQL',
		'lua' => 'Lua',
		'luapage' => 'LuaPage',
		'lucene' => 'Lucene',
		'lsl' => 'LSL',
		'makefile' => 'Makefile',
		'markdown' => 'Markdown',
		'mushcode' => 'TinyMUSH',
		'objectivec' => 'Objective-C',
		'ocaml' => 'OCaml',
		'pascal' => 'Pascal',
		'perl' => 'Perl',
		'pgsql' => 'pgSQL',
		'php' => 'PHP',
		'powershell' => 'Powershell',
		'python' => 'Python',
		'r' => 'R',
		'rdoc' => 'RDoc',
		'rhtml' => 'RHTML',
		'ruby' => 'Ruby',
		'scad' => 'OpenSCAD',
		'scala' => 'Scala',
		'scss' => 'SCSS',
		'sass' => 'SASS',
		'sh' => 'SH',
		'sql' => 'SQL',
		'stylus' => 'Stylus',
		'svg' => 'SVG',
		'tcl' => 'Tcl',
		'tex' => 'Tex',
		'text' => 'Text',
		'textile' => 'Textile',
		'tmsnippet' => 'tmSnippet',
		'toml' => 'toml',
		'typescript' => 'Typescript',
		'vbscript' => 'VBScript',
		'velocity' => 'Velocity',
		'xml' => 'XML',
		'xquery' => 'XQuery',
		'yaml' => 'YAML'
	);

	/**
	 * Filename extensions of languages available for syntax highlighting
	 * @var array
	 */
	$lang_exts = array(
		'abap' => 'ABAP',
		'asciidoc' => 'AsciiDoc',
		'c9search' => 'C9Search',
		'coffee' => 'CoffeeScript',
		'coldfusion' => '.cfm',
		'csharp' => 'C#',
		'css' => '.css',
		'curly' => 'Curly',
		'dart' => 'Dart',
		'diff' => 'Diff',
		'dot' => 'Dot',
		'ftl' => 'FreeMarker',
		'glsl' => 'Glsl',
		'golang' => 'Go',
		'groovy' => 'Groovy',
		'haxe' => 'haXe',
		'haml' => 'HAML',
		'html' => '.html',
		'c_cpp' => 'C/C++',
		'clojure' => 'Clojure',
		'jade' => 'Jade',
		'java' => 'Java',
		'jsp' => 'JSP',
		'javascript' => '.js',
		'json' => '.json',
		'jsx' => 'JSX',
		'latex' => 'LaTeX',
		'less' => 'LESS',
		'lisp' => 'Lisp',
		'scheme' => 'Scheme',
		'liquid' => 'Liquid',
		'livescript' => 'LiveScript',
		'logiql' => 'LogiQL',
		'lua' => 'Lua',
		'luapage' => 'LuaPage',
		'lucene' => 'Lucene',
		'lsl' => 'LSL',
		'makefile' => 'Makefile',
		'markdown' => '.md',
		'mushcode' => 'TinyMUSH',
		'objectivec' => '.c',
		'ocaml' => 'OCaml',
		'pascal' => 'Pascal',
		'perl' => '.pl',
		'pgsql' => 'pgSQL',
		'php' => '.php',
		'powershell' => 'Powershell',
		'python' => '.py',
		'r' => 'R',
		'rdoc' => 'RDoc',
		'rhtml' => 'RHTML',
		'ruby' => 'Ruby',
		'scad' => 'OpenSCAD',
		'scala' => 'Scala',
		'scss' => '.scss',
		'sass' => 'SASS',
		'sh' => '.sh',
		'sql' => '.sql',
		'stylus' => 'Stylus',
		'svg' => 'SVG',
		'tcl' => '.tcl',
		'tex' => 'Tex',
		'text' => '.txt',
		'textile' => 'Textile',
		'tmsnippet' => 'tmSnippet',
		'toml' => 'toml',
		'typescript' => 'Typescript',
		'vbscript' => 'VBScript',
		'velocity' => 'Velocity',
		'xml' => '.xml',
		'xquery' => 'XQuery',
		'yaml' => 'YAML'
	);

	/**
	 * Return the filename of the current file
	 * @param  arr $link The MySQL link
	 * @return str       The filename of the current file
	 */
	function getCurrentFile($link, $mysqltbl) {
		if( isset($_GET['filename']) && $_GET['filename'] ) {
			return $_GET['filename'];
		} else {
			if($link) {
				$sql = "SELECT id, filename FROM " . $mysqltbl . " ORDER BY updated DESC LIMIT 1";
				$query = mysql_query($sql) or die(mysql_error() . ' [data.php]');
				$numrows = mysql_num_rows($query);
				if($numrows):
					while(list($id, $filename) = mysql_fetch_row($query)) {
						return $filename;
					}
				endif;
			}
		}
	}

	/**
	 * Return the extension of the given filename
	 * @param  arr $link The MySQL link
	 * @return str       The extension of the given filename
	 */
	function getFileExtension($filename) {
		return (new SplFileInfo($filename))->getExtension();
	}

	/**
	 * Return the extension of the given language
	 * @param  arr $link The MySQL link
	 * @return str       The extension of the given language
	 */
	function getLanguageExtension($lang, $lang_exts) {
		return $lang_exts[$lang];
	}