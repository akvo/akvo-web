<?php

/******************************************************************************
	WP Business Intelligence Lite
	Author: WP Business Intelligence
	Website: www.wpbusinessintelligence.com
	Contact: http://www.wpbusinessintelligence.com/contactus/

	This file is part of WP Business Intelligence Lite.

    WP Business Intelligence Lite is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    WP Business Intelligence Lite is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with WP Business Intelligence Lite; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
	
	You can find a copy of the GPL licence here:
	http://www.gnu.org/licenses/gpl-3.0.html
******************************************************************************/

class nvd3_utils
{
    // remove null fields from JSON structure
    function strip_null_fields($data)
    {
        $stripped = explode("\n", $data);
        $position = 0;

        foreach ($stripped as $key => $value)
        {
            if (strpos($value,'null') !== false) {
                array_splice($stripped, $position, 1);
                $position--;
                if (strpos($value,',') === false)
                {
                    $stripped[$position] = substr($stripped[$position], 0, strlen($stripped[$position]) - 1);
                }
            }
            $position++;
        }

        return (implode("\n", $stripped));
    }

    //return an array of color shades based on starting colors
    public function getShades($colors, $size)
    {
        $remainders = $size % count($colors);
        $shades = array();
        $shades_n = floor($size / count($colors));
        $idx = 0;

        for($col = 0; $col < count($colors); $col++)
        {
            if($col + 1 < count($colors)){
                for($i = 0; $i < $shades_n; $i++)
                {
                    $shades[$idx++] = $this->shadeColor($colors[$col], (-35 / ($shades_n - $i) ));
                }
            }
            else{

                for($i = 0; $i < $shades_n + $remainders; $i++)
                {
                    $shades[$idx++] = $this->shadeColor($colors[$col], (-35 / ($shades_n + $remainders - $i) ));
                }
            }
        }

        return json_encode($shades);
    }

    public function shadeColor($color, $percent) {
        $num = base_convert(substr($color, 1), 16, 10);
        $amt = round(2.55 * $percent);
        $r = ($num >> 16) + $amt;
        $b = ($num >> 8 & 0x00ff) + $amt;
        $g = ($num & 0x0000ff) + $amt;

        return '#'.substr(base_convert(0x1000000 + ($r<255?$r<1?0:$r:255)*0x10000 + ($b<255?$b<1?0:$b:255)*0x100 + ($g<255?$g<1?0:$g:255), 10, 16), 1);
    }

}