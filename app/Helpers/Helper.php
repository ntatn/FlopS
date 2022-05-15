<?php
namespace App\Helpers;
use Illuminate\Support\Str;

class Helper{
    public static function menu($menus, $parent_id = 0, $char = '') {
        $html = '';
        foreach ($menus as $key => $menu) {
            if ($menu->parent_id == $parent_id){
                $html .= '
                    <tr>
                        <td>'. $menu->id .'</td>
                        <td>'.$char. $menu->name .'</td>
                        <td>'. self::active($menu->active) .'</td>
                        <td>'. $menu->updated_at .'</td>
                        <td>
                            <a class = "btn btn-primary btn-sm" href = "/admin/menus/edit/'. $menu->id .'">
                                <i class="fas fa-edit"></i>
                            </a>
                            &nbsp;
                            <a href = "#" class = "btn btn-danger btn-sm" onclick = "removeRow('.$menu->id.')">
                            <i class="fas fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                ';
                unset($menus[$key]);

                $html .= self::menu($menus,$menu->id, $char .'--');
            }
        }
        return $html;
    }
    public static function active($active = 0) {
        return $active == 0 ? '<span class="btn btn-danger btn-xs">NO</span>' : '<span class="btn btn-success btn-xs">YES</span>';
    }


    public static function menus($menus, $parent_id = 0)
    {
        $html = '';
        foreach ($menus as $key => $menu) {
            if ($menu->parent_id == $parent_id) {
                $html .= '
                    <li>
                        <a href="/danh-muc/' . $menu->id . '-' . Str::slug($menu->name, '-') . '.html">
                            ' . $menu->name . '
                        </a>';

                unset($menus[$key]);

                if (self::isChild($menus, $menu->id)) {
                    $html .= '<ul class="sub-menu">';
                    $html .= self::menus($menus, $menu->id);
                    $html .= '</ul>';
                }

                $html .= '</li>';
            }
        }

        return $html;
    }
    public static function isChild($menus, $id)
    {
        foreach ($menus as $menu) {
            if ($menu->parent_id == $id) {
                return true;
            }
        }

        return false;
    }
    public static function price($priceOld = 0, $price = 0)
    {
        if ($priceOld != 0) return number_format($priceOld);
        if ($price != 0)  return number_format($price);
        return '<a href="/contact.html">Contact</a>';
    }

    public static function view($id){
        $html = '';
        $html .= '
            <a href="#" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1" onclick = "quickView('.$id.')">
                Quick View
            </a>
            ';
        return $html;
    }


}