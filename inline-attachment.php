<?php
// InlineAttachment plugin by nibreh
// Thanks to Rovak - http://git.razko.nl/InlineAttachment/
class YellowInlineAttachment
{
	const VERSION = "0.7.1";
	var $yellow;		//access to API

	// Handle initialisation
	function onLoad($yellow)
	{
		$this->yellow = $yellow;
		if(!$this->yellow->config->isExisting("jqueryCdn"))
		{
			$this->yellow->config->setDefault("jqueryCdn", "https://code.jquery.com/jquery-3.2.1.min.js");
		}
	}

	// Handle page extra HTML data
	function onExtra($name)
	{
		$output = null;
		if($name=="header" && $this->yellow->getRequestHandler()=="edit")
		{
			$imageLocation = $this->yellow->config->get("serverBase").$this->yellow->config->get("imageLocation");
			$pluginLocation = $this->yellow->config->get("serverBase").$this->yellow->config->get("pluginLocation");
			$jqueryCdn = $this->yellow->config->get("jqueryCdn");
			$output .= "<script type=\"text/javascript\" src=\"{$jqueryCdn}\"></script>\n";
			$output .= "<script type=\"text/javascript\" src=\"{$pluginLocation}inline-attachment.js\"></script>\n";
			$output .= "<script type=\"text/javascript\" src=\"{$pluginLocation}jquery.inline-attachment.js\"></script>\n";
			$output .= "<script type=\"text/javascript\">\n";
			$output .= "\$(function() {\$('textarea').inlineattachment({uploadUrl: '{$imageLocation}upload_attachment.php'});});";
			$output .= "</script>\n";
		}
		return $output;
	}
}

$yellow->plugins->register("inlineattachment", "YellowInlineAttachment", YellowInlineAttachment::VERSION);
?>
