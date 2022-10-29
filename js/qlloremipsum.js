/**
 * @package        plg_editors-xtd_qlloremipsum
 * @copyright    Copyright (C) 2017 ql.de All rights reserved.
 * @author        Mareike Riegel mareike.riegel@ql.de
 * @license        GNU General Public License version 2 or later; see LICENSE.txt
 */

(() => {
  window.insertQlloremipsum = (destination, strToBeInserted) => {
    window.Joomla.editors.instances[destination].replaceSelection(strToBeInserted);
    return true;
  }
})();

function qlloremipsum(x) {
  window.insertQlloremipsum(x);
}
