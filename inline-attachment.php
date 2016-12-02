<?php
// InlineAttachment plugin by nibreh
// Thanks to Rovak - http://git.razko.nl/InlineAttachment/
class YellowInlineAttachment
{
	const VERSION = "0.6.6";
	var $yellow;		//access to API

	// Handle initialisation
	function onLoad($yellow)
	{
		$this->yellow = $yellow;
		if(!$this->yellow->config->isExisting("jqueryCdn"))
		{
			$this->yellow->config->setDefault("jqueryCdn", "https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.1/");
		}
	}

	// Handle page extra HTML data
	function onExtra($name)
	{
		$output = null;
		if($name=="header" && $this->yellow->getRequestHandler()=="webinterface")
		{
			$imageLocation = $this->yellow->config->get("serverBase").$this->yellow->config->get("imageLocation");
			$pluginLocation = $this->yellow->config->get("serverBase").$this->yellow->config->get("pluginLocation");
			$jqueryCdn = $this->yellow->config->get("jqueryCdn");
			$output .= "<script type=\"text/javascript\" src=\"{$jqueryCdn}jquery.min.js\"></script>\n";
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
