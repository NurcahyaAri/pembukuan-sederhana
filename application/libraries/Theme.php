<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Theme
{
	protected $ci;
	protected $dev;
	protected $is_admin = false;
	// protected $template_assets = 'assets/themes/';
	protected $view_header = 'component/header.php';
	protected $view_footer = 'component/footer.php';

	public function __construct()
	{
        $this->ci =& get_instance();

        //load
        $this->ci->load->helper('url');
	}

	public function view($path='', $data=array())
	{
		$data['page_title'] = (!empty($data['page_title'])) ? $data['page_title'] : '';
		$html = '';
		$html.= $this->ci->load->view($this->view_header, $data, true);
		// $html.= $this->ci->load->view('themes/v2/header_navigation', $data, true);
		$html.= $this->ci->load->view($path, $data, true);
		$html.= $this->ci->load->view($this->view_footer, $data, true);
		echo $html;
	}

	public function disable_page()
	{
		$data['page_title'] = 'Access Forbidden';
		$this->view('themes/v2/access_forbidden_v', $data);die();
	}

	public function navigation()
	{
		$data = array();

		$data['dashboard'] = array(
			'text' => 'Dashboard',
			'url' => 'dashboard',
			'access_page' => array( 'view' => true ),
			'access_detail' => array(
				'view_cashflow' => 'View Cash Flow',
				'view_entertainincome' => 'View Entertain Income',
				'view_sales' => 'View Sales',
				'view_incometotal' => 'View Income Total',
				'view_transactiontotal' => 'View Transaction Total'
			)
		);
		$data['reports'] = array(
			'text' => 'Reports',
			'url' => 'reports',
			'access_page' => array('view'=>true)
		);
			//LEVEL 2 REPORTS
			$data['reports']['sub']['reports_sales'] = array(
				'text' => 'Sales',
				'url' => 'reports/sales',
				'access_page' => array('view'=>true),
				'sub' => array(
					array(
						'text' => 'Sales Summary',
						'url' => 'reports/sales/sales_summary',
						'access_page' => array('view'=>true),
					),
					array(
						'text' => 'Sales History',
						'url' => 'reports/sales/history',
						'access_page' => array('view'=>true),
					),
					array(
						'text' => 'Closing Shift',
						'url' => 'reports/sales/closing_shift',
						'access_page' => array('view'=>true),
					),
					array(
						'text' => 'Sales By',
						'url' => 'reports/sales/sales_by',
						'access_page' => array('view'=>true),
					),
					array(
						'text' => 'Entertain Sales',
						'url' => 'reports/sales/entertain',
						'access_page' => array('view'=>true),
					),
					array(
						'text' => 'Ranking',
						'url' => 'reports/sales/rangking_trl',
						'access_page' => array('view'=>true),
					),
					array(
						'text' => 'Sales Analys',
						'url' => 'reports/sales/sales_analysy',
						'access_page' => array('view'=>true),
					),
					array(
						'text' => 'Tax & Gratuity',
						'url' => 'reports/sales/tax_gratuity',
						'access_page' => array('view'=>true),
					),
				)
			);
			$data['reports']['sub']['reports_stock'] = array(
				'text' => 'Stock',
				'url' => 'reports/stock',
				'access_page' => array('view'=>true),
				'sub' => array(
					array(
						'text' => 'Stock Card',
						'url' => 'reports/stock/card',
						'access_page' => array('view'=>true),
					),
				)
			);
			
		$data['products'] = array(
			'text' => 'Products',
			'url' => 'products',
			'access_page' => array('view'=>true)
		);
			//LEVEL 2 PRODUCTS
			$data['products']['sub']['type'] = array(
				'text' => 'Type',
				'url' => 'products/type',
				'access_page' => array('view'=>true)
			);
			$data['products']['sub']['category'] = array(
				'text' => 'Category',
				'url' => 'products/category',
				'access_page' => array('view'=>true)
			);
			$data['products']['sub']['subcategory'] = array(
				'text' => 'Sub-Category',
				'url' => 'products/subcategory',
				'access_page' => array('view'=>true)
			);
			$data['products']['sub']['purchasereportcategory'] = array(
				'text' => 'Purchase Report Category',
				'url' => 'products/purchase-report-category',
				'access_page' => array('view'=>true)
			);
			$data['products']['sub']['unit'] = array(
				'text' => 'Unit',
				'url' => 'products/unit',
				'access_page' => array('view'=>true)
			);
			if (ENVIRONMENT=='production') {
				$data['products']['sub']['catalogue'] = array(
					'text' => 'Product Catalogue',
					'url' => 'products/product-catalogue',
					'access_page' => array('view'=>true)
				);
			}
			else{
				$data['products']['sub']['catalogue'] = array(
					'text' => '*Catalogue',
					'url' => 'products/catalogue',
					'access_page' => array('view'=>true)
				);
			}
			$data['products']['sub']['description'] = array(
				'text' => 'Product Description',
				'url' => 'products/product-description',
				'access_page' => array('view'=>true)
			);

			if (ENVIRONMENT=='production') {
				$data['products']['sub']['breakdown'] = array(
					'text' => 'Breakdown',
					'url' => 'products/breakdown',
					'access_page' => array('view'=>true)
				);
			} else{
				$data['products']['sub']['breakdown'] = array(
					'text' => '*Breakdown',
					'url' => 'products/breakdown_new',
					'access_page' => array('view'=>true)
				);
			}

			$data['products']['sub']['taxgratuity'] = array(
				'text' => 'Tax & Gratuity',
				'url' => 'products/taxgratuity',
				'access_page' => array('view'=>true)
			);
			

			//dev mode (LV 2)
			if (ENVIRONMENT!='production') {
				$data['products']['sub']['accounts'] = array(
					'text' => '*Accounts',
					'url' => 'products/accounts',
					'access_page' => array('view'=>true)
				);
					//LEVEL 3 PRODUCTS -> ACCOUNTS
					$data['products']['sub']['accounts']['sub']['acc_category'] = array(
						'text' => 'Category',
						'url' => 'products/accounts/accounts_category',
						'access_page' => array('view' => true),
					);
					$data['products']['sub']['accounts']['sub']['acc_lists'] = array(
						'text' => 'Lists',
						'url' => 'products/accounts/accounts_list',
						'access_page' => array('view' => true),
					);
			}
		//LEVEL 1
		$data['purchase'] = array(
			'text' => 'Purchase',
			'url' => 'purchase',
			'access_page' => array('view'=>true),
			'sub' => array(
				array(
					'text' => 'Supplier',
					'url' => 'purchase/supplier',
					'access_page' => array('view'=>true),
				),
				array(
					'text' => 'Purchase',
					'url' => 'purchase/purchase',
					'access_page' => array('view'=>true),
					'sub' => array(
						array(
							'text' => 'Purchase Products',
							'url' => 'purchase/purchase/purchase_products',
							'access_page' => array('view'=>true),
						),
						array(
							'text' => 'Purchase Confirm',
							'url' => 'purchase/purchase/purchase_confrim',
							'access_page' => array('view'=>true),
						),
						array(
							'text' => 'Ingredients Detail',
							'url' => 'purchase/purchase/ingridients_detail',
							'access_page' => array('view'=>true),
						),
						array(
							'text' => 'Equipments Detail',
							'url' => 'purchase/purchase/equipment_detail',
							'access_page' => array('view'=>true),
						),
						array(
							'text' => 'Products Detail',
							'url' => 'purchase/purchase/product_detail',
							'access_page' => array('view'=>true),
						),
						array(
							'text' => 'Operational Cost',
							'url' => 'purchase/purchase/operationalcost',
							'access_page' => array('view'=>true),
						),
						array(
							'text' => 'Retur',
							'url' => 'purchase/purchase/retur',
							'access_page' => array('view'=>true),
						),
					)
				),
				array(
					'text' => 'Debt',
					'url' => 'purchase/debt',
					'access_page' => array('view'=>true),
					'sub' => array(
						array(
							'text' => 'Debt List',
							'url' => 'purchase/debt/debtlist',
							'access_page' => array('view'=>true),
						),
						array(
							'text' => 'Debt Payments',
							'url' => 'purchase/debt/debtpayment',
							'access_page' => array('view'=>true),
						),
					)
				),
				array(
					'text' => 'Transfer',
					'url' => 'purchase/transfer',
					'access_page' => array('view'=>true),
				),
			)
		);

		//LEVEL 1 STOCK
		$data['stock'] = array(
			'text' => 'Stock',
			'url' => 'stock',
			'access_page' => array('view'=>true)
		);
			//LEVEL 2
			$data['stock']['sub']['stockestimation'] = array(
				'text' => 'Stock Estimation',
				'url' => 'stock/estimation',
				'access_page' => array('view'=>true)
			);
			$data['stock']['sub']['stocksummary'] = array(
				'text' => 'Stock Summary',
				'url' => 'stock/summary',
				'access_page' => array('view'=>true),
				'sub' => array(
					//LEVEL3
					'summary_productsingredients' => array(
						'text' => 'Products & Ingredients',
						'url' => 'stock/summary/products_ingredients',
						'access_page' => array('view'=>true)
					),
					'summary_equipment' => array(
						'text' => 'Equipments',
						'url' => 'stock/summary/equipments',
						'access_page' => array('view'=>true)
					)
				)
			);


			$data['stock']['sub']['stockopname'] = array(
				'text' => 'Opname',
				'url' => 'stock/opname',
				'access_page' => array('view'=>true),
				'sub' => array(
					//LEVEL 3
					'opname_opnameinventory' => array(
						'text' => 'Opname & Inventory',
						'url' => 'stock/opname/opname_inventory',
						'access_page' => array('view'=>true)
					),
					'opname_stockopname' => array(
						'text' => 'Stock Opname',
						'url' => 'stock/opname/stock_opname',
						'access_page' => array('view'=>true)
					),
					'opname_equipmentinventory' => array(
						'text' => 'Equipment Inventory',
						'url' => 'stock/opname/equipment_inventory',
						'access_page' => array('view'=>true)
					)
				)
			);
			$data['stock']['sub']['spoil'] = array(
				'text' => 'Spoil',
				'url' => 'stock/spoil',
				'access_page' => array('view'=>true),
				'sub' => array(
					//LEVEL 3
					'spoil_damage' => array(
						'text' => 'Damage',
						'url' => 'stock/spoil/spoil_damage',
						'access_page' => array('view'=>true),
					),
					'spoil_productingredient' => array(
						'text' => 'Products & Ingredients',
						'url' => 'stock/spoil/spoil_productingridient',
						'access_page' => array('view'=>true),
					),
					'spoil_equipment' => array(
						'text' => 'Equipment',
						'url' => 'stock/spoil/spoil_equipment',
						'access_page' => array('view'=>true),
					),
				)
			);
			if ($this->dev) {
				$data['stock']['sub']['equipmentrequest'] = array(
					'text' => 'Equipment Request',
					'url' => 'stock/equipment_request',
					'access_page' => array('view'=>true)
				);
			}


		//LEVEL 1
		$data['outlets'] = array(
			'text' => 'Outlets',
			'url' => 'outlets',
			'access_page' => array('view'=>true)
		);
			//LEVEL 2 OUTLETS
			$data['outlets']['sub']['list'] = array(
				'text' => 'Outlet List',
				'url' => 'outlets/outletlist',
				'access_page' => array('view'=>true)
			);
			$data['outlets']['sub']['shift'] = array(
				'text' => 'Shift',
				'url' => 'outlets/shift',
				'access_page' => array('view'=>true)
			);
			$data['outlets']['sub']['paymentmedia'] = array(
				'text' => 'Payment Media',
				'url' => 'outlets/paymentmedia',
				'access_page' => array('edit'=>true)
			);
			$data['outlets']['sub']['bankaccount'] = array(
				'text' => 'Bank Account',
				'url' => 'outlets/bankaccount',
				'access_page' => array('view'=>true)
			);
			$data['outlets']['sub']['devices'] = array(
				'text' => 'Devices',
				'url' => 'outlets/devices',
				'access_page' => array('view'=>true)
			);
			$data['outlets']['sub']['printer'] = array(
				'text' => 'Printer',
				'url' => 'outlets/printer',
				'access_page' => array('view'=>true)
			);
			$data['outlets']['sub']['subscribe'] = array(
				'text' => 'Subscribe',
				'url' => 'outlets/subscribe',
			);
			$data['outlets']['sub']['store'] = array(
				'text' => 'Store',
				'url' => 'outlets/store',
			);
		//LEVEL 1
		$data['employees'] = array(
			'text' => 'Employees',
			'url' => 'employees',
			'access_page' => array('view'=>true)
		);
			//LEVEL 2 EMPLOYEES
			$data['employees']['sub']['crewlist'] = array(
				'text' => 'Crew List',
				'url' => 'employees/crewlist',
			);
			$data['employees']['sub']['jabatan'] = array(
				'text' => 'Jabatan',
				'url' => 'employees/jabatan',
				'access_page' => array('view'=>true)
			);

			if ($this->dev) {
				$data['employees']['sub']['jadwal'] = array(
					'text' => 'Jadwal',
					'url' => 'employees/jadwal',
				);
				$data['employees']['sub']['absensi'] = array(
					'text' => 'Absensi',
					'url' => 'employees/absensi',
				);
				$data['employees']['sub']['sallary'] = array(
					'text' => 'Sallary',
					'url' => 'employees/sallary',
				);
				$data['employees']['sub']['internalmemo'] = array(
					'text' => 'Internal Memo',
					'url' => 'employees/internalmemo',
				);
					//LEVEL 3 EMPLOYEES -> INTERNAL MEMO
					$data['employees']['sub']['internalmemo']['sub']['smsblast'] = array(
						'text' => 'SMS Blast',
						'url' => 'employees/internalmemo/smsblast',
					);
					$data['employees']['sub']['internalmemo']['sub']['emailblast'] = array(
						'text' => 'E-mail Blast',
						'url' => 'employees/internalmemo/emailblast',
					);
			}

		//LEVEL 1 CUSTOMER
		if ($this->dev) {
			$data['customer'] = array(
				'text' => 'Customer',
				'url' => 'customer',
				'access_page' => array('view'=>true),
				'sub' => array()
			);
				//customer lv2
				$data['customer']['sub']['member'] = array(
					'text' => 'Member',
					'url' => 'customer/member',
					'access_page' => array('view'=>true),
					'sub' => array()
				);
					//customer lv3
					// $data['customer']['sub']['member']['sub']['type'] = array(
					// 	'text' => 'Member Type',
					// 	'url' => 'customer/member/type',
					// 	'access_page' => array('view' => true, 'add'=>true, 'edit'=>true, 'delete'=>true),
					// );

				//lv2
				$data['customer']['sub']['customerlist'] = array(
					'text' => 'Customer List',
					'url' => 'customer/customerlist',
					'access_page' => array('view'=>true),
				);
				$data['customer']['sub']['autotexting'] = array(
					'text' => 'Auto Texting',
					'url' => 'customer/autotexting',
					'access_page' => array()
				);
		}

		//LEVEL 1 PROMOTION
		if ($this->dev) {
			$data['promotion'] = array(
				'text' => 'Promotion',
				'url' => 'promotion',
				'access_page' => array('view'=>true)
			);
				// //LEVEL 2 OUTLETS
				// $data['promotion']['sub']['list'] = array(
				// 	'text' => 'Outlet List',
				// 	'url' => 'outlets/outletlist',
				// 	'access_page' => array('view'=>true)
				// );
		}

		//LEVEL 1 PRODUCTION
		if ($this->dev) {
			$data['production'] = array(
				'text' => 'Production',
				'url' => 'production',
				'access_page' => array('view'=>true),
			);
			//LV2
			$data['production']['sub']['production'] = array(
				'text' => 'Production',
				'url' => 'production/production',
				'access_page' => array('view' => true),
			);
			$data['production']['sub']['itembreakdown'] = array(
				'text' => 'Item Breakdown',
				'url' => 'production/itembreakdown',
				'access_page' => array('view' => true),
			);
		}

		//LEVEL 1 FINANCE
		if (ENVIRONMENT!='production') {
			$data['finance'] = array(
				'text' => 'Finance',
				'url' => 'finance',
				'access_page' => array('view'=>true),
			);
			//LV2
			$data['finance']['sub']['accounts_category'] = array(
				'text' => 'Accounts Category',
				'url' => 'finance/accounts_category',
				'access_page' => array('view' => true),
			);
			$data['finance']['sub']['accounts_list'] = array(
				'text' => 'Accounts List',
				'url' => 'finance/accounts_list',
				'access_page' => array('view' => true),
			);
		}


		return $data;
	}

	

}

/* End of file Template.php */
/* Location: ./application/libraries/template/Template.php */
