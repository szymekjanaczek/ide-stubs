<?php

/* This file is part of the Phalcon Framework.
 *
 * (c) Phalcon Team <team@phalcon.io>
 *
 * For the full copyright and license information, please view the LICENSE.txt
 * file that was distributed with this source code.
 */
namespace Phalcon\Mvc;

use Phalcon\Di\DiInterface;
use Phalcon\Di\AbstractInjectionAware;
use Phalcon\Events\EventsAwareInterface;
use Phalcon\Events\ManagerInterface;
use Phalcon\Http\RequestInterface;
use Phalcon\Mvc\Router\Exception;
use Phalcon\Mvc\Router\GroupInterface;
use Phalcon\Mvc\Router\Route;
use Phalcon\Mvc\Router\RouteInterface;

/**
 * Phalcon\Mvc\Router
 *
 * Phalcon\Mvc\Router is the standard framework router. Routing is the
 * process of taking a URI endpoint (that part of the URI which comes after the
 * base URL) and decomposing it into parameters to determine which module,
 * controller, and action of that controller should receive the request
 *
 * ```php
 * use Phalcon\Mvc\Router;
 *
 * $router = new Router();
 *
 * $router->add(
 *     "/documentation/{chapter}/{name}\.{type:[a-z]+}",
 *     [
 *         "controller" => "documentation",
 *         "action"     => "show",
 *     ]
 * );
 *
 * $router->handle(
 *     "/documentation/1/examples.html"
 * );
 *
 * echo $router->getControllerName();
 * ```
 */
class Router extends AbstractInjectionAware implements \Phalcon\Mvc\RouterInterface, \Phalcon\Events\EventsAwareInterface
{
    const POSITION_FIRST = 0;

    const POSITION_LAST = 1;

    /**
     * @var string|null
     */
    protected $action = null;

    /**
     * @var string|null
     */
    protected $controller = null;

    /**
     * @var string|null
     */
    protected $defaultAction = null;

    /**
     * @var string|null
     */
    protected $defaultController = null;

    /**
     * @var string|null
     */
    protected $defaultModule = null;

    /**
     * @var string|null
     */
    protected $defaultNamespace = null;

    /**
     * @var array
     */
    protected $defaultParams = [];

    /**
     * @var ManagerInterface|null
     */
    protected $eventsManager;

    /**
     * @var array
     */
    protected $keyRouteNames = [];

    /**
     * @var array
     */
    protected $keyRouteIds = [];

    /**
     * @var RouteInterface|null
     */
    protected $matchedRoute = null;

    /**
     * @var array
     */
    protected $matches = [];

    /**
     * @var string|null
     */
    protected $module = null;

    /**
     * @var string|null
     */
    protected $namespaceName = null;

    /**
     * @var array|string|null
     */
    protected $notFoundPaths = null;

    /**
     * @var array
     */
    protected $params = [];

    /**
     * @var bool
     */
    protected $removeExtraSlashes = false;

    /**
     * @var array
     */
    protected $routes = [];

    /**
     * @var bool
     */
    protected $wasMatched = false;

    /**
     * @return array
     */
    public function getKeyRouteNames(): array
    {
    }

    /**
     * @param array $keyRouteNames
     */
    public function setKeyRouteNames(array $keyRouteNames)
    {
    }

    /**
     * @return array
     */
    public function getKeyRouteIds(): array
    {
    }

    /**
     * @param array $keyRouteIds
     */
    public function setKeyRouteIds(array $keyRouteIds)
    {
    }

    /**
     * Phalcon\Mvc\Router constructor
     *
     * @param bool $defaultRoutes
     */
    public function __construct(bool $defaultRoutes = true)
    {
    }

    /**
     * Adds a route to the router without any HTTP constraint
     *
     * ```php
     * use Phalcon\Mvc\Router;
     *
     * $router->add("/about", "About::index");
     *
     * $router->add(
     *     "/about",
     *     "About::index",
     *     ["GET", "POST"]
     * );
     *
     * $router->add(
     *     "/about",
     *     "About::index",
     *     ["GET", "POST"],
     *     Router::POSITION_FIRST
     * );
     * ```
     *
     * @param string $pattern
     * @param string|array|null $paths = [
     *     'module => '',
     *     'controller' => '',
     *     'action' => '',
     *     'namespace' => ''
     * ]
     * @param string|array|null $httpMethods
     * @param int $position *
     * @return RouteInterface
     */
    public function add(string $pattern, $paths = null, $httpMethods = null, int $position = Router::POSITION_LAST): RouteInterface
    {
    }

    /**
     * Adds a route to the router that only match if the HTTP method is CONNECT
     *
     * @param string $pattern
     * @param string|array|null $paths = [
     *     'module => '',
     *     'controller' => '',
     *     'action' => '',
     *     'namespace' => ''
     * ]
     * @param int $position *
     * @return RouteInterface
     */
    public function addConnect(string $pattern, $paths = null, int $position = Router::POSITION_LAST): RouteInterface
    {
    }

    /**
     * Adds a route to the router that only match if the HTTP method is DELETE
     *
     * @param string $param
     * @param string|array|null $paths = [
     *     'module => '',
     *     'controller' => '',
     *     'action' => '',
     *     'namespace' => ''
     * ]
     * @param int $position *
     * @return RouteInterface
     * @param string $pattern
     */
    public function addDelete(string $pattern, $paths = null, int $position = Router::POSITION_LAST): RouteInterface
    {
    }

    /**
     * Adds a route to the router that only match if the HTTP method is GET
     *
     * @param string $param
     * @param string|array|null $paths = [
     *     'module => '',
     *     'controller' => '',
     *     'action' => '',
     *     'namespace' => ''
     * ]
     * @param int $position *
     * @return RouteInterface
     * @param string $pattern
     */
    public function addGet(string $pattern, $paths = null, int $position = Router::POSITION_LAST): RouteInterface
    {
    }

    /**
     * Adds a route to the router that only match if the HTTP method is HEAD
     *
     * @param string $pattern
     * @param string|array|null $paths = [
     *     'module => '',
     *     'controller' => '',
     *     'action' => '',
     *     'namespace' => ''
     * ]
     * @param int $position *
     * @return RouteInterface
     */
    public function addHead(string $pattern, $paths = null, int $position = Router::POSITION_LAST): RouteInterface
    {
    }

    /**
     * Add a route to the router that only match if the HTTP method is OPTIONS
     *
     * @param string $pattern
     * @param string|array|null $paths = [
     *     'module => '',
     *     'controller' => '',
     *     'action' => '',
     *     'namespace' => ''
     * ]
     * @param int $position *
     * @return RouteInterface
     */
    public function addOptions(string $pattern, $paths = null, int $position = Router::POSITION_LAST): RouteInterface
    {
    }

    /**
     * Adds a route to the router that only match if the HTTP method is PATCH
     *
     * @param string $pattern
     * @param string|array|null $paths = [
     *     'module => '',
     *     'controller' => '',
     *     'action' => '',
     *     'namespace' => ''
     * ]
     * @param int $position *
     * @return RouteInterface
     */
    public function addPatch(string $pattern, $paths = null, int $position = Router::POSITION_LAST): RouteInterface
    {
    }

    /**
     * Adds a route to the router that only match if the HTTP method is POST
     *
     * @param string $pattern
     * @param string|array|null $paths = [
     *     'module => '',
     *     'controller' => '',
     *     'action' => '',
     *     'namespace' => ''
     * ]
     * @param int $position *
     * @return RouteInterface
     */
    public function addPost(string $pattern, $paths = null, int $position = Router::POSITION_LAST): RouteInterface
    {
    }

    /**
     * Adds a route to the router that only match if the HTTP method is PURGE
     * (Squid and Varnish support)
     *
     * @param string $pattern
     * @param string|array|null $paths = [
     *     'module => '',
     *     'controller' => '',
     *     'action' => '',
     *     'namespace' => ''
     * ]
     * @param int $position *
     * @return RouteInterface
     */
    public function addPurge(string $pattern, $paths = null, int $position = Router::POSITION_LAST): RouteInterface
    {
    }

    /**
     * Adds a route to the router that only match if the HTTP method is PUT
     *
     * @param string $pattern
     * @param string|array $paths = [
     *     'module => '',
     *     'controller' => '',
     *     'action' => '',
     *     'namespace' => ''
     * ]
     * @param int $position *
     * @return RouteInterface
     */
    public function addPut(string $pattern, $paths = null, int $position = Router::POSITION_LAST): RouteInterface
    {
    }

    /**
     * Adds a route to the router that only match if the HTTP method is TRACE
     *
     * @param string $pattern
     * @param string|array|null $paths = [
     *     'module => '',
     *     'controller' => '',
     *     'action' => '',
     *     'namespace' => ''
     * ]
     * @param int $position *
     * @return RouteInterface
     */
    public function addTrace(string $pattern, $paths = null, int $position = Router::POSITION_LAST): RouteInterface
    {
    }

    /**
     * Attach Route object to the routes stack.
     *
     * ```php
     * use Phalcon\Mvc\Router;
     * use Phalcon\Mvc\Router\Route;
     *
     * class CustomRoute extends Route {
     *      // ...
     * }
     *
     * $router = new Router();
     *
     * $router->attach(
     *     new CustomRoute("/about", "About::index", ["GET", "HEAD"]),
     *     Router::POSITION_FIRST
     * );
     * ```
     *
     * @param RouteInterface $route
     * @param int $position *
     * @return RouterInterface
     */
    public function attach(\Phalcon\Mvc\Router\RouteInterface $route, int $position = Router::POSITION_LAST): RouterInterface
    {
    }

    /**
     * Removes all the pre-defined routes
     *
     * @return void
     */
    public function clear(): void
    {
    }

    /**
     * Returns the internal event manager
     *
     * @return ManagerInterface|null
     */
    public function getEventsManager(): ?ManagerInterface
    {
    }

    /**
     * Returns the processed action name
     *
     * @return string
     */
    public function getActionName(): string
    {
    }

    /**
     * Returns the processed controller name
     *
     * @return string
     */
    public function getControllerName(): string
    {
    }

    /**
     * Returns the route that matches the handled URI
     *
     * @return RouteInterface
     */
    public function getMatchedRoute(): RouteInterface
    {
    }

    /**
     * Returns the sub expressions in the regular expression matched
     *
     * @return array
     */
    public function getMatches(): array
    {
    }

    /**
     * Returns the processed module name
     *
     * @return string
     */
    public function getModuleName(): string
    {
    }

    /**
     * Returns the processed namespace name
     *
     * @return string
     */
    public function getNamespaceName(): string
    {
    }

    /**
     * Returns the processed parameters
     *
     * @return array
     */
    public function getParams(): array
    {
    }

    /**
     * Returns a route object by its id
     *
     * @param mixed $id *
     * @return RouteInterface|bool
     */
    public function getRouteById($id)
    {
    }

    /**
     * Returns a route object by its name
     *
     * @param string $name *
     * @return RouteInterface|bool
     */
    public function getRouteByName(string $name)
    {
    }

    /**
     * Returns all the routes defined in the router
     *
     * @return array
     */
    public function getRoutes(): array
    {
    }

    /**
     * Handles routing information received from the rewrite engine
     *
     * ```php
     * // Passing a URL
     * $router->handle("/posts/edit/1");
     * ```
     *
     * @param string $uri *
     * @return void
     */
    public function handle(string $uri): void
    {
    }

    /**
     * Returns whether controller name should not be mangled
     *
     * @return bool
     */
    public function isExactControllerName(): bool
    {
    }

    /**
     * Mounts a group of routes in the router
     *
     * @param GroupInterface $group *
     * @return RouterInterface
     */
    public function mount(\Phalcon\Mvc\Router\GroupInterface $group): RouterInterface
    {
    }

    /**
     * Set a group of paths to be returned when none of the defined routes are
     * matched
     *
     * @param array|string|null $paths *
     * @return RouterInterface
     */
    public function notFound($paths): RouterInterface
    {
    }

    /**
     * Set whether router must remove the extra slashes in the handled routes
     *
     * @param bool $remove *
     * @return RouterInterface
     */
    public function removeExtraSlashes(bool $remove): RouterInterface
    {
    }

    /**
     * Sets the default action name
     *
     * @param string $actionName *
     * @return RouterInterface
     */
    public function setDefaultAction(string $actionName): RouterInterface
    {
    }

    /**
     * Sets the default controller name
     *
     * @param string $controllerName *
     * @return RouterInterface
     */
    public function setDefaultController(string $controllerName): RouterInterface
    {
    }

    /**
     * Sets the name of the default module
     *
     * @param string $moduleName *
     * @return RouterInterface
     */
    public function setDefaultModule(string $moduleName): RouterInterface
    {
    }

    /**
     * Sets the name of the default namespace
     *
     * @parma string namespaceName
     *
     * @return RouterInterface
     * @param string $namespaceName
     */
    public function setDefaultNamespace(string $namespaceName): RouterInterface
    {
    }

    /**
     * Sets an array of default paths. If a route is missing a path the router
     * will use the defined here. This method must not be used to set a 404
     * route
     *
     * ```php
     * $router->setDefaults(
     *     [
     *         "module" => "common",
     *         "action" => "index",
     *     ]
     * );
     * ```
     *
     * @param array $defaults *
     * @return RouterInterface
     */
    public function setDefaults(array $defaults): RouterInterface
    {
    }

    /**
     * Returns an array of default parameters
     *
     * @return array
     */
    public function getDefaults(): array
    {
    }

    /**
     * Sets the events manager
     *
     * @param ManagerInterface $eventsManager *
     * @return void
     */
    public function setEventsManager(\Phalcon\Events\ManagerInterface $eventsManager): void
    {
    }

    /**
     * Checks if the router matches any of the defined routes
     *
     * @return bool
     */
    public function wasMatched(): bool
    {
    }
}