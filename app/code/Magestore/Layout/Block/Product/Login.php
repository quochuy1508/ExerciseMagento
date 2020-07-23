<?php

namespace Magestore\Layout\Block\Product;
use Magento\Framework\Registry;
use Magento\Catalog\Model\CategoryFactory;
use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;

class Login extends Template
{

    public function formLogin()
    {
        return "<span class='header_account_link_list logout'>
		<a class= 'header_account_link'>Logout</a>
	</span>
<?php else: ?>
	<span class='header_account_link_list login'>
		<a class= 'header_account_link'>Sign in</a>
	</span>";
    }
}
