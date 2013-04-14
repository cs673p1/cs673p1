<?php
/**
 * Licensed to the Apache Software Foundation (ASF) under one
 * or more contributor license agreements. See the NOTICE file
 * distributed with this work for additional information
 * regarding copyright ownership. The ASF licenses this file
 * to you under the Apache License, Version 2.0 (the
 * "License"); you may not use this file except in compliance
 * with the License. You may obtain a copy of the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing,
 * software distributed under the License is distributed on an
 * "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY
 * KIND, either express or implied. See the License for the
 * specific language governing permissions and limitations under the License.
 *
 * @author Colin Fletcher
 * @copyright (C) Colin Fletcher 2011
 * @package States
 * @version 1.1
 */
	class States extends CApplicationComponent {
	
		/**
		 * Based on USPS definitions
		 * @var array
		 */
		protected static $us = array(
			"AL" => "Alabama",
			"AK" => "Alaska",
			"AZ" => "Arizona",
			"AR" => "Arkansas",
			"CA" => "California",
			"CO" => "Colorado",
			"CT" => "Connecticut",
			"DE" => "Delaware",
			"DC" => "District of Columbia",
			"FL" => "Florida",
			"GA" => "Georgia",
			"HI" => "Hawaii",
			"ID" => "Idaho",
			"IL" => "Illinois",
			"IN" => "Indiana",
			"IA" => "Iowa",
			"KS" => "Kansas",
			"KY" => "Kentucky",
			"LA" => "Louisiana",
			"ME" => "Maine",
			"MD" => "Maryland",
			"MA" => "Massachusetts",
			"MI" => "Michigan",
			"MN" => "Minnesota",
			"MS" => "Mississippi",
			"MO" => "Missouri",
			"MT" => "Montana",
			"NE" => "Nebraska",
			"NV" => "Nevada",
			"NH" => "New Hampshire",
			"NJ" => "New Jersey",
			"NM" => "New Mexico",
			"NY" => "New York",
			"NC" => "North Carolina",
			"ND" => "North Dakota",
			"OH" => "Ohio",
			"OK" => "Oklahoma",
			"OR" => "Oregon",
			"PA" => "Pennsylvania",
			"RI" => "Rhode Island",
			"SC" => "South Carolina",
			"SD" => "South Dakota",
			"TN" => "Tennessee",
			"TX" => "Texas",
			"UT" => "Utah",
			"VT" => "Vermont",
			"VA" => "Virginia",
			"WA" => "Washington",
			"WV" => "West Virginia",
			"WI" => "Wisconsin",
			"WY" => "Wyoming"
		);
		
		/**
		 * Based on USPS definitions
		 * @var array
		 */
		protected static $us_territories = array(
			"AS" => "American Samoa",
			"GU" => "Guam",
			"MP" => "Northern Marianas Islands",
			"PR" => "Puerto Rico",
			"VI" => "Virgin Islands",
			"FM" => "Federated States of Micronesia",
			"MH" => "Marshall Islands",
			"PW" => "Palau",
			"AA" => "Armed Forces(AA)",
			"AE" => "Armed Forces(AE)",
			"AP" => "Armed Forces(AP)"
		);
		
		/**
		 * Based on Canada Post definitions
		 * @var array
		 */
		protected static $canada = array(
			"AB" => "Alberta",
			"BC" => "British Columbia",
			"MB" => "Manitoba",
			"NB" => "New Brunswick",
			"NL" => "Newfoundland",
			"NT" => "Northwest Territory",
			"NS" => "Nova Scotia",
			"ON" => "Ontario",
			"PE" => "Prince Edward Island",
			"QC" => "Quebec",
			"SK" => "Saskatchewan",
			"YT" => "Yukon Territory"
		);
		
		/**
		 * Will add a separator between different lists
		 * @var boolean
		 */
		private static $seperateCountries;
		
		/**
		 * Will be the first value in the dropdown
		 * Ex. Please select a state
		 * @var string
		 */
		private static $prompt;
		
		/**
		 * The name attribute of the dropdown element
		 * @var string
		 */
		private static $name = "state";
		
		/**
		 * The value that is selected in the dropdown element
		 * @var string
		 */
		private static $selected = "";
		
		/**
		 * Renders the HTML code for the drop down list.
		 * @param mixed $countries
		 * @param array $options
		 */
		public static function render($countries, $options = array(), $htmlOptions = array()){
			$data = array();
			self::initOptions($options);
			if(is_array($countries)){
				$stateCount = count($countries);
				$ctr = 1;
				foreach($countries as $s){
					if(!self::IsValidOption($s)){
						throw new CException('The supported countries are "US", "US TERRITORIES" and "CANADA"');
						break;
					}
					$_s = strtolower(str_replace(" ", "_", $s));
					$data = array_merge($data, self::$$_s);
					if($ctr < $stateCount && self::$seperateCountries){
						$data = array_merge($data, array("$ctr" => "-----------------"));
					}
					$ctr++;
				}
			} else {
				$_s = strtolower(str_replace(" ", "_", $countries));
				
				if(self::IsValidOption($countries)){
					$data = self::$$_s;
				} else {
					throw new CException('The supported countries are "US", "US TERRITORIES" and "CANADA"');
				}
			}
			
			echo CHtml::dropDownList(self::$name, self::$selected, $data, $htmlOptions);
		}
		
		/**
		 * Validates that the input is supported
		 * @param string $option
		 * @return boolean 
		 */
		private static function IsValidOption($option){
			$validOptions = array("us", "us territories", "canada");
			
			return (in_array(strtolower($option), $validOptions));
		}
		
		/**
		 * Sets all options to local variables
		 * @param array $options
		 */
		private static function initOptions($options){
			if(!is_array($options)){
				return;
			}
			
			foreach($options as $k => $value){
				try{
					self::$$k = $value;
				} catch(Exception $e){}
			}
        }

        public static function getStates(array $countries, $shortName = FALSE)
        {
            $return = array();
            if(in_array('US', $countries)){
                $return += self::$us;
            }

            if(in_array('CANADA', $countries)){
                $return += self::$canada;
            }

            if(in_array('US TERRITORIES', $countries)){
                $return += self::$us_territories;
            }
                                        
            if($shortName){
                foreach ($return as $key => &$value){
                    $value = $key;
                }
            }

            return $return;
        }
	}
