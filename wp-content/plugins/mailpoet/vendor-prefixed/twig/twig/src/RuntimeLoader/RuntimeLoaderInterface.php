<?php
namespace MailPoetVendor\Twig\RuntimeLoader;
if (!defined('ABSPATH')) exit;
interface RuntimeLoaderInterface
{
 public function load($class);
}
\class_alias('MailPoetVendor\\Twig\\RuntimeLoader\\RuntimeLoaderInterface', 'MailPoetVendor\\Twig_RuntimeLoaderInterface');
