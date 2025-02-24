<?php
namespace MailPoetVendor\Twig\Extension;
if (!defined('ABSPATH')) exit;
use MailPoetVendor\Twig\NodeVisitor\SandboxNodeVisitor;
use MailPoetVendor\Twig\Sandbox\SecurityNotAllowedMethodError;
use MailPoetVendor\Twig\Sandbox\SecurityNotAllowedPropertyError;
use MailPoetVendor\Twig\Sandbox\SecurityPolicyInterface;
use MailPoetVendor\Twig\Sandbox\SourcePolicyInterface;
use MailPoetVendor\Twig\Source;
use MailPoetVendor\Twig\TokenParser\SandboxTokenParser;
final class SandboxExtension extends AbstractExtension
{
 private $sandboxedGlobally;
 private $sandboxed;
 private $policy;
 private $sourcePolicy;
 public function __construct(SecurityPolicyInterface $policy, $sandboxed = \false, ?SourcePolicyInterface $sourcePolicy = null)
 {
 $this->policy = $policy;
 $this->sandboxedGlobally = $sandboxed;
 $this->sourcePolicy = $sourcePolicy;
 }
 public function getTokenParsers() : array
 {
 return [new SandboxTokenParser()];
 }
 public function getNodeVisitors() : array
 {
 return [new SandboxNodeVisitor()];
 }
 public function enableSandbox() : void
 {
 $this->sandboxed = \true;
 }
 public function disableSandbox() : void
 {
 $this->sandboxed = \false;
 }
 public function isSandboxed(?Source $source = null) : bool
 {
 return $this->sandboxedGlobally || $this->sandboxed || $this->isSourceSandboxed($source);
 }
 public function isSandboxedGlobally() : bool
 {
 return $this->sandboxedGlobally;
 }
 private function isSourceSandboxed(?Source $source) : bool
 {
 if (null === $source || null === $this->sourcePolicy) {
 return \false;
 }
 return $this->sourcePolicy->enableSandbox($source);
 }
 public function setSecurityPolicy(SecurityPolicyInterface $policy)
 {
 $this->policy = $policy;
 }
 public function getSecurityPolicy() : SecurityPolicyInterface
 {
 return $this->policy;
 }
 public function checkSecurity($tags, $filters, $functions, ?Source $source = null) : void
 {
 if ($this->isSandboxed($source)) {
 $this->policy->checkSecurity($tags, $filters, $functions);
 }
 }
 public function checkMethodAllowed($obj, $method, int $lineno = -1, ?Source $source = null) : void
 {
 if ($this->isSandboxed($source)) {
 try {
 $this->policy->checkMethodAllowed($obj, $method);
 } catch (SecurityNotAllowedMethodError $e) {
 $e->setSourceContext($source);
 $e->setTemplateLine($lineno);
 throw $e;
 }
 }
 }
 public function checkPropertyAllowed($obj, $property, int $lineno = -1, ?Source $source = null) : void
 {
 if ($this->isSandboxed($source)) {
 try {
 $this->policy->checkPropertyAllowed($obj, $property);
 } catch (SecurityNotAllowedPropertyError $e) {
 $e->setSourceContext($source);
 $e->setTemplateLine($lineno);
 throw $e;
 }
 }
 }
 public function ensureToStringAllowed($obj, int $lineno = -1, ?Source $source = null)
 {
 if (\is_array($obj)) {
 foreach ($obj as $v) {
 $this->ensureToStringAllowed($v, $lineno, $source);
 }
 return $obj;
 }
 if ($this->isSandboxed($source) && \is_object($obj) && \method_exists($obj, '__toString')) {
 try {
 $this->policy->checkMethodAllowed($obj, '__toString');
 } catch (SecurityNotAllowedMethodError $e) {
 $e->setSourceContext($source);
 $e->setTemplateLine($lineno);
 throw $e;
 }
 }
 return $obj;
 }
}
