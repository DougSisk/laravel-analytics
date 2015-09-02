<?php namespace Ipunkt\LaravelAnalytics\Contracts;

use Ipunkt\LaravelAnalytics\Data\Campaign;
use Ipunkt\LaravelAnalytics\Data\Event;

/**
 * Interface AnalyticsProviderInterface
 *
 * @package Ipunkt\LaravelAnalytics\Contracts
 */
interface AnalyticsProviderInterface
{
	/**
	 * returns the javascript code for embedding the analytics stuff
	 *
	 * @return string
	 */
	public function render();

	/**
	 * track an page view
	 *
	 * @param string $page
	 * @param null|string $title
	 * @param null|string $hittype
	 *
	 * @return void
	 */
	public function trackPage($page, $title = null, $hittype = null);

	/**
	 * track an event
	 *
	 * @param string $category
	 * @param string $action
	 * @param null|string $label
	 * @param null|int $value
	 *
	 * @return void
	 */
	public function trackEvent($category, $action, $label = null, $value = null);

	/**
	 * track any custom code
	 *
	 * @param string $customCode
	 *
	 * @return void
	 */
	public function trackCustom($customCode);

	/**
	 * enable display features
	 *
	 * @return AnalyticsProviderInterface
	 */
	public function enableDisplayFeatures();

	/**
	 * disable display features
	 *
	 * @return AnalyticsProviderInterface
	 */
	public function disableDisplayFeatures();

	/**
	 * enable auto tracking
	 *
	 * @return AnalyticsProviderInterface
	 */
	public function enableAutoTracking();

	/**
	 * disable auto tracking
	 *
	 * @return AnalyticsProviderInterface
	 */
	public function disableAutoTracking();

	/**
	 * assembles an url for tracking measurement without javascript
	 *
	 * e.g. for tracking email open events within a newsletter
	 *
	 * @param string $metricName
	 * @param mixed $metricValue
	 * @param \Ipunkt\LaravelAnalytics\Data\Event $event
	 * @param \Ipunkt\LaravelAnalytics\Data\Campaign $campaign
	 * @param string|null $clientId
	 * @param array $params
	 *
	 * @return string
	 */
	public function trackMeasurementUrl($metricName, $metricValue, Event $event, Campaign $campaign, $clientId = null, array $params = array());

	/**
	 * sets or gets nonInteraction
	 *
	 * setting: $this->nonInteraction(true)->render();
	 * getting: if ($this->nonInteraction()) echo 'non-interaction set';
	 *
	 * @param boolean|null $value
	 *
	 * @return bool|AnalyticsProviderInterface
	 */
	public function nonInteraction($value = null);
}