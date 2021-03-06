<?php

/**
 * \AppserverIo\Psr\Servlet\ServletSessionInterface
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 *
 * PHP version 5
 *
 * @author    Tim Wagner <tw@appserver.io>
 * @copyright 2015 TechDivision GmbH <info@appserver.io>
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link      https://github.com/appserver-io-psr/servlet
 * @link      http://www.appserver.io
 */

namespace AppserverIo\Psr\Servlet;

/**
 * Interface for all servlet sessions.
 *
 * @author    Tim Wagner <tw@appserver.io>
 * @copyright 2015 TechDivision GmbH <info@appserver.io>
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link      https://github.com/appserver-io-psr/servlet
 * @link      http://www.appserver.io
 *
 * The comments below hint at methods present in widely used explicit implementations of this interface and MAY
 * be introduced in the next MAJOR release of this PSR
 *
 * @method \AppserverIo\Psr\Servlet\ServletSessionInterface emptyInstance()        emptyInstance() Creates a new and empty session instance
 */
interface ServletSessionInterface
{

    /**
     * The configuration key for probability the garbage collector will be invoked on the session.
     *
     * @return string
     */
    const GARBAGE_COLLECTION_PROBABILITY = 'GarbageCollectionProbability';

    /**
     * The configuration key for the session name.
     *
     * @return string
     */
    const SESSION_NAME = 'SessionName';

    /**
     * The configuration key for the session file prefix.
     *
     * @return string
     */
    const SESSION_FILE_PREFIX = 'SessionFilePrefix';

    /**
     * The configuration key for the path we persist the session.
     *
     * @return string
     */
    const SESSION_SAVE_PATH = 'SessionSavePath';

    /**
     * The configuration key for the number of seconds until the session expires, if defined.
     *
     * @return string
     */
    const SESSION_MAXIMUM_AGE = 'SessionMaximumAge';

    /**
     * The configuration key for the inactivity timeout until the session will be invalidated.
     *
     * @return string
     */
    const SESSION_INACTIVITY_TIMEOUT = 'SessionInactivityTimeout';

    /**
     * The configuration key for the session cookie lifetime.
     *
     * @return string
     */
    const SESSION_COOKIE_LIFETIME = 'SessionCookieLifetime';

    /**
     * The configuration key for the cookie domain set for the session.
     *
     * @return string
     */
    const SESSION_COOKIE_DOMAIN = 'SessionCookieDomain';

    /**
     * The configuration key for the cookie path set for the session.
     *
     * @return string
     */
    const SESSION_COOKIE_PATH = 'SessionCookiePath';

    /**
     * The configuration key for the flag that the session cookie should only be set in a secure connection.
     *
     * @return string
     */
    const SESSION_COOKIE_SECURE = 'SessionCookieSecure';

    /**
     * The configuration key for the flag if the session should set a Http only cookie.
     *
     * @return string
     */
    const SESSION_COOKIE_HTTP_ONLY = 'SessionHttpOnly';

    /**
     * Starts the session, if it has not been already started
     *
     * @return void
     */
    public function start();

    /**
     * Tells if the session has been started already.
     *
     * @return boolean
     */
    public function isStarted();

    /**
     * Returns the current session identifier
     *
     * @return string The current session identifier
     */
    public function getId();

    /**
     * Returns the unix time stamp marking the last point in time this session has
     * been in use.
     *
     * For the current (local) session, this method will always return the current
     * time. For a remote session, the unix timestamp will be returned.
     *
     * @return integer UNIX timestamp
     */
    public function getLastActivityTimestamp();

    /**
     * Returns the session name.
     *
     * @return string The session name
     */
    public function getName();

    /**
     * Returns date and time after the session expires.
     *
     * @return integer|\DateTime The date and time after the session expires
     */
    public function getLifetime();

    /**
     * Sets date and time after the session expires.
     *
     * @param integer|\DateTime $lifetime The date and time after the session expires
     *
     * @return void
     */
    public function setLifetime($lifetime);

    /**
     * Returns the number of seconds until the session expires.
     *
     * @return integer|null Number of seconds until the session expires
     */
    public function getMaximumAge();

    /**
     * Sets the number of seconds until the session expires.
     *
     * @param integer $maximumAge Number of seconds until the session expires
     *
     * @return void
     */
    public function setMaximumAge($maximumAge);

    /**
     * Sets the session name.
     *
     * @param string $name The session name
     *
     * @return void
     */
    public function setName($name);

    /**
     * Returns the host to which the user agent will send this cookie.
     *
     * @return string|null The host to which the user agent will send this cookie
     */
    public function getDomain();

    /**
     * Sets the host to which the user agent will send this cookie.
     *
     * @param string $domain The host to which the user agent will send this cookie
     *
     * @return void
     */
    public function setDomain($domain);

    /**
     * Returns the path describing the scope of this cookie.
     *
     * @return string The path describing the scope of this cookie
     */
    public function getPath();

    /**
     * Sets the path describing the scope of this cookie.
     *
     * @param string $path The path describing the scope of this cookie
     *
     * @return void
     */
    public function setPath($path);

    /**
     * Returns if this session should only be sent through a "secure" channel by the user agent.
     *
     * @return boolean TRUE if the session should only be sent through a "secure" channel, else FALSE
     */
    public function isSecure();

    /**
     * Sets the flag that this session should only be sent through a "secure" channel by the user agent.
     *
     * @param boolean $secure TRUE if the session should only be sent through a "secure" channel, else FALSE
     *
     * @return void
     */
    public function setSecure($secure = true);

    /**
     * Returns if this session should only be used through the HTTP protocol.
     *
     * @return boolean TRUE if the session should only be used through the HTTP protocol
     */
    public function isHttpOnly();

    /**
     * Sets the flag that this session should only be used through the HTTP protocol.
     *
     * @param boolean $httpOnly TRUE if the session should only be used through the HTTP protocol
     *
     * @return void
     */
    public function setHttpOnly($httpOnly = true);

    /**
     * Sets the current session identifier.
     *
     * @param string $id The current session identifier
     *
     * @return void
     */
    public function setId($id);

    /**
     * Returns the data associated with the given key.
     *
     * @param string $key An identifier for the content stored in the session.
     *
     * @return mixed The contents associated with the given key
     */
    public function getData($key);

    /**
     * Returns TRUE if a session data entry $key is available.
     *
     * @param string $key Entry identifier of the session data
     *
     * @return boolean
     */
    public function hasKey($key);

    /**
     * Stores the given data under the given key in the session
     *
     * @param string $key  The key under which the data should be stored
     * @param mixed  $data The data to be stored
     *
     * @return void
     */
    public function putData($key, $data);

    /**
     * Tags this session with the given tag.
     *
     * Note that third-party libraries might also tag your session. Therefore it is
     * recommended to use namespaced tags such as "Acme-Demo-MySpecialTag".
     *
     * @param string $tag The tag – must match be a valid cache frontend tag
     *
     * @return void
     */
    public function addTag($tag);

    /**
     * Removes the specified tag from this session.
     *
     * @param string $tag The tag – must match be a valid cache frontend tag
     *
     * @return void
     */
    public function removeTag($tag);

    /**
     * Returns the tags this session has been tagged with.
     *
     * @return array The tags or an empty array if there aren't any
     */
    public function getTags();

    /**
     * Returns TRUE if there is a session that can be resumed.
     *
     * If a to-be-resumed session was inactive for too long, this function will
     * trigger the expiration of that session. An expired session cannot be resumed.
     *
     * NOTE that this method does a bit more than the name implies: Because the
     * session info data needs to be loaded, this method stores this data already
     * so it doesn't have to be loaded again once the session is being used.
     *
     * @return boolean
     */
    public function canBeResumed();

    /**
     * Resumes an existing session, if any.
     *
     * @return integer If a session was resumed, the inactivity of since the last request is returned
     */
    public function resume();

    /**
     * Explicitly destroys all session data.
     *
     * @param string $reason The reason why the session has been destroyed
     *
     * @return void
     */
    public function destroy($reason);

    /**
     * Returns the checksum for this session instance.
     *
     * @return string The checksum
     */
    public function checksum();
}
