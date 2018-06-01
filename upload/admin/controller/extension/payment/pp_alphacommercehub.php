<?php
class ControllerExtensionPaymentPPAlphacommercehub extends Controller {
	private $error = array();
	public function index() {
		$this->load->language('extension/payment/pp_alphacommercehub');
		$this->document->setTitle($this->language->get('heading_title'));
		$this->load->model('setting/setting');
		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
			$this->model_setting_setting->editSetting('payment_pp_alphacommercehub', $this->request->post);
			$this->session->data['success'] = $this->language->get('text_success');
			$this->response->redirect($this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=payment', true));
		}
		if (isset($this->error['warning'])) {
			$data['error_warning'] = $this->error['warning'];
		} else {
			$data['error_warning'] = '';
		}
		if (isset($this->error['email'])) {
			$data['error_email'] = $this->error['email'];
		} else {
			$data['error_email'] = '';
		}
		if (isset($this->error['merchant'])) {
			$data['error_merchant'] = $this->error['merchant'];
		} else {
			$data['error_merchant'] = '';
		}
		if (isset($this->error['url'])) {
			$data['error_url'] = $this->error['url'];
		} else {
			$data['error_url'] = '';
		}
		if (isset($this->error['userid'])) {
			$data['error_userid'] = $this->error['userid'];
		} else {
			$data['error_userid'] = '';
		}
		$data['breadcrumbs'] = array();
		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/dashboard', 'user_token=' . $this->session->data['user_token'], true)
		);
		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_extension'),
			'href' => $this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=payment', true)
		);
		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('heading_title'),
			'href' => $this->url->link('extension/payment/pp_alphacommercehub', 'user_token=' . $this->session->data['user_token'], true)
		);
		$data['action'] = $this->url->link('extension/payment/pp_alphacommercehub', 'user_token=' . $this->session->data['user_token'], true);
		$data['cancel'] = $this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=payment', true);
		if (isset($this->request->post['payment_pp_alphacommercehub_email'])) {
			$data['payment_pp_alphacommercehub_email'] = $this->request->post['payment_pp_alphacommercehub_email'];
		} else {
			$data['payment_pp_alphacommercehub_email'] = $this->config->get('payment_pp_alphacommercehub_email');
		}
		if (isset($this->request->post['payment_pp_alphacommercehub_test'])) {
			$data['payment_pp_alphacommercehub_test'] = $this->request->post['payment_pp_alphacommercehub_test'];
		} else {
			$data['payment_pp_alphacommercehub_test'] = $this->config->get('payment_pp_alphacommercehub_test');
		}
		if (isset($this->request->post['payment_pp_alphacommercehub_transaction'])) {
			$data['payment_pp_alphacommercehub_transaction'] = $this->request->post['payment_pp_alphacommercehub_transaction'];
		} else {
			$data['payment_pp_alphacommercehub_transaction'] = $this->config->get('payment_pp_alphacommercehub_transaction');
		}
		if (isset($this->request->post['payment_pp_alphacommercehub_debug'])) {
			$data['payment_pp_alphacommercehub_debug'] = $this->request->post['payment_pp_alphacommercehub_debug'];
		} else {
			$data['payment_pp_alphacommercehub_debug'] = $this->config->get('payment_pp_alphacommercehub_debug');
		}
		if (isset($this->request->post['payment_pp_alphacommercehub_total'])) {
			$data['payment_pp_alphacommercehub_total'] = $this->request->post['payment_pp_alphacommercehub_total'];
		} else {
			$data['payment_pp_alphacommercehub_total'] = $this->config->get('payment_pp_alphacommercehub_total');
		}
		if (isset($this->request->post['payment_pp_alphacommercehub_canceled_reversal_status_id'])) {
			$data['payment_pp_alphacommercehub_canceled_reversal_status_id'] = $this->request->post['payment_pp_alphacommercehub_canceled_reversal_status_id'];
		} else {
			$data['payment_pp_alphacommercehub_canceled_reversal_status_id'] = $this->config->get('payment_pp_alphacommercehub_canceled_reversal_status_id');
		}
		if (isset($this->request->post['payment_pp_alphacommercehub_completed_status_id'])) {
			$data['payment_pp_alphacommercehub_completed_status_id'] = $this->request->post['payment_pp_alphacommercehub_completed_status_id'];
		} else {
			$data['payment_pp_alphacommercehub_completed_status_id'] = $this->config->get('payment_pp_alphacommercehub_completed_status_id');
		}
		if (isset($this->request->post['payment_pp_alphacommercehub_denied_status_id'])) {
			$data['payment_pp_alphacommercehub_denied_status_id'] = $this->request->post['payment_pp_alphacommercehub_denied_status_id'];
		} else {
			$data['payment_pp_alphacommercehub_denied_status_id'] = $this->config->get('payment_pp_alphacommercehub_denied_status_id');
		}
		if (isset($this->request->post['payment_pp_alphacommercehub_expired_status_id'])) {
			$data['payment_pp_alphacommercehub_expired_status_id'] = $this->request->post['payment_pp_alphacommercehub_expired_status_id'];
		} else {
			$data['payment_pp_alphacommercehub_expired_status_id'] = $this->config->get('payment_pp_alphacommercehub_expired_status_id');
		}
		if (isset($this->request->post['payment_pp_alphacommercehub_user'])) {
            $data['payment_pp_alphacommercehub_user'] = $this->request->post['payment_pp_alphacommercehub_user'];
        } else {
            $data['payment_pp_alphacommercehub_user'] = $this->config->get('payment_pp_alphacommercehub_user');
        }
if (isset($this->request->post['payment_pp_alphacommercehub_mode'])) {
            $data['payment_pp_alphacommercehub_mode'] = $this->request->post['payment_pp_alphacommercehub_mode'];
        } else {
            $data['payment_pp_alphacommercehub_mode'] = $this->config->get('payment_pp_alphacommercehub_mode');
        }
        
        if (isset($this->request->post['payment_pp_alphacommercehub_url'])) {
            $data['payment_pp_alphacommercehub_url'] = $this->request->post['payment_pp_alphacommercehub_url'];
        } else {
            $data['payment_pp_alphacommercehub_url'] = $this->config->get('payment_pp_alphacommercehub_url');
        }
if (isset($this->request->post['payment_pp_alphacommercehub_merchant'])) {
            $data['payment_pp_alphacommercehub_merchant'] = $this->request->post['payment_pp_alphacommercehub_merchant'];
        } else {
            $data['payment_pp_alphacommercehub_merchant'] = $this->config->get('payment_pp_alphacommercehub_merchant');
        }
		if (isset($this->request->post['payment_pp_alphacommercehub_failed_status_id'])) {
			$data['payment_pp_alphacommercehub_failed_status_id'] = $this->request->post['payment_pp_alphacommercehub_failed_status_id'];
		} else {
			$data['payment_pp_alphacommercehub_failed_status_id'] = $this->config->get('payment_pp_alphacommercehub_failed_status_id');
		}
		if (isset($this->request->post['payment_pp_alphacommercehub_pending_status_id'])) {
			$data['payment_pp_alphacommercehub_pending_status_id'] = $this->request->post['payment_pp_alphacommercehub_pending_status_id'];
		} else {
			$data['payment_pp_alphacommercehub_pending_status_id'] = $this->config->get('payment_pp_alphacommercehub_pending_status_id');
		}
		if (isset($this->request->post['payment_pp_alphacommercehub_processed_status_id'])) {
			$data['payment_pp_alphacommercehub_processed_status_id'] = $this->request->post['payment_pp_alphacommercehub_processed_status_id'];
		} else {
			$data['payment_pp_alphacommercehub_processed_status_id'] = $this->config->get('payment_pp_alphacommercehub_processed_status_id');
		}
		if (isset($this->request->post['payment_pp_alphacommercehub_refunded_status_id'])) {
			$data['payment_pp_alphacommercehub_refunded_status_id'] = $this->request->post['payment_pp_alphacommercehub_refunded_status_id'];
		} else {
			$data['payment_pp_alphacommercehub_refunded_status_id'] = $this->config->get('payment_pp_alphacommercehub_refunded_status_id');
		}
		if (isset($this->request->post['payment_pp_alphacommercehub_reversed_status_id'])) {
			$data['payment_pp_alphacommercehub_reversed_status_id'] = $this->request->post['payment_pp_alphacommercehub_reversed_status_id'];
		} else {
			$data['payment_pp_alphacommercehub_reversed_status_id'] = $this->config->get('payment_pp_alphacommercehub_reversed_status_id');
		}
		if (isset($this->request->post['payment_pp_alphacommercehub_voided_status_id'])) {
			$data['payment_pp_alphacommercehub_voided_status_id'] = $this->request->post['payment_pp_alphacommercehub_voided_status_id'];
		} else {
			$data['payment_pp_alphacommercehub_voided_status_id'] = $this->config->get('payment_pp_alphacommercehub_voided_status_id');
		}
		$this->load->model('localisation/order_status');
		$data['order_statuses'] = $this->model_localisation_order_status->getOrderStatuses();
		if (isset($this->request->post['payment_pp_alphacommercehub_geo_zone_id'])) {
			$data['payment_pp_alphacommercehub_geo_zone_id'] = $this->request->post['payment_pp_alphacommercehub_geo_zone_id'];
		} else {
			$data['payment_pp_alphacommercehub_geo_zone_id'] = $this->config->get('payment_pp_alphacommercehub_geo_zone_id');
		}
		$this->load->model('localisation/geo_zone');
		$data['geo_zones'] = $this->model_localisation_geo_zone->getGeoZones();
		if (isset($this->request->post['payment_pp_alphacommercehub_status'])) {
			$data['payment_pp_alphacommercehub_status'] = $this->request->post['payment_pp_alphacommercehub_status'];
		} else {
			$data['payment_pp_alphacommercehub_status'] = $this->config->get('payment_pp_alphacommercehub_status');
		}
		if (isset($this->request->post['payment_pp_alphacommercehub_sort_order'])) {
			$data['payment_pp_alphacommercehub_sort_order'] = $this->request->post['payment_pp_alphacommercehub_sort_order'];
		} else {
			$data['payment_pp_alphacommercehub_sort_order'] = $this->config->get('payment_pp_alphacommercehub_sort_order');
		}
		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');
		$this->response->setOutput($this->load->view('extension/payment/pp_alphacommercehub', $data));
	}
	private function validate() {
		if (!$this->user->hasPermission('modify', 'extension/payment/pp_alphacommercehub')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}
		if (!$this->request->post['payment_pp_alphacommercehub_email']) {
			$this->error['email'] = $this->language->get('error_email');
		}
		if (!$this->request->post['payment_pp_alphacommercehub_merchant']) {
			$this->error['merchant'] = $this->language->get('error_merchant');
		}
		if (!$this->request->post['payment_pp_alphacommercehub_url']) {
			$this->error['url'] = $this->language->get('error_url');
		}
		if (!$this->request->post['payment_pp_alphacommercehub_user']) {
			$this->error['userid'] = $this->language->get('error_userid');
		}
		return !$this->error;
	}
}
