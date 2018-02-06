<?php
namespace MatthiasWeb\RealMediaLibrary\usersettings;
use MatthiasWeb\RealMediaLibrary\general;
use MatthiasWeb\RealMediaLibrary\api;

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

class Demo implements api\IUserSettings {
    
    public function content($content, $user) {
        $content .= '<tr>
            <th scope="row">用户#' . $user . '演示</th>
            <td>
                <textarea name="demo" type="text" class="regular-text" style="width: 100%;box-sizing: border-box;">您的文字</textarea>
                <p class="description">数据不能保存</p>
            </td>
        </tr>
        <tr class="rml-meta-margin"></tr>';
        
        return $content;
    }
    
    public function save($response, $user) {
        $response["errors"][] = "An error occured with demo text: " . $_POST["demo"] . ". 这只是一个演示.";
        return $response;
    }

    public function scripts() {
        // Silence is golden.
    }
}