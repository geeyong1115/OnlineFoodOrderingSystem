<?php
   //Reading XML using the SAX(Simple API for XML) parser 
   
   $foods   = array();
   $elements   = null;

   // Called to this function when tags are opened 
   function startElements($parser, $number, $attrs) {
      global $foods, $elements;
      
      if(!empty($number)) {
         if ($number == 'FOODBEVERAGE') {
            // creating an array to store information
            $foods []= array();
         }
         $elements = $number;
      }
   }
   
   // Called to this function when tags are closed 
   function endElements($parser, $number) {
      global $elements;
      
      if(!empty($number)) {
         $elements = null;
      }
   }
   
   // Called on the text between the start and end of the tags
   function characterData($parser, $data) {
      global $foods, $elements;
      
      if(!empty($data)) {
         if ($elements == 'ID' || $elements == 'STATUS') {
            $foods[count($foods)-1][$elements] = trim($data);
         }
      }
   }
   
   // Creates a new XML parser and returns a resource handle referencing it to be used by the other XML functions. 
   $parser = xml_parser_create(); 
   
   xml_set_element_handler($parser, "startElements", "endElements");
   xml_set_character_data_handler($parser, "characterData");
   
   // open xml file
   if (!($handle = fopen('foodBeverage.xml', "r"))) {
      die("could not open XML input");
   }
   
   while($data = fread($handle, 4096)){
        // read xml file {
        xml_parse($parser, $data);  // start parsing an xml document 
   } 
 
    xml_parser_free($parser); // deletes the parser
    $i = 1;

   foreach($foods as $food) {
       echo "No - ".$i.'<br/>';
       echo "Account No - ".$food['NUMBER'].'<br/>';
       echo "Balance - ".$food['BALANCE'].'<br/><br/>';
       $i++; 
   }
?>