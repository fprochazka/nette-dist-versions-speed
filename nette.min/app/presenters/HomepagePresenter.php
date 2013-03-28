<?php

namespace App;

use Nette,
	Model;


/**
 * Homepage presenter.
 */
class HomepagePresenter extends BasePresenter
{

	public function renderDefault()
	{
		$before = (float)microtime(TRUE);
		echo (
			class_exists('Nette\Callback') && 
			class_exists('Nette\Environment') && 
			interface_exists('Nette\IFreezable') && 
			class_exists('Nette\FreezableObject') && 
			class_exists('Nette\Framework') && 
			class_exists('Nette\ObjectMixin') && 
			class_exists('Nette\Object') && 
			class_exists('Nette\Image') && 
			class_exists('Nette\ArrayHash') && 
			class_exists('Nette\ArrayList') && 
			class_exists('Nette\DateTime') && 
			class_exists('Nette\Security\Identity') && 
			interface_exists('Nette\Security\IAuthenticator') && 
			class_exists('Nette\Security\User') && 
			interface_exists('Nette\Security\IAuthorizator') && 
			class_exists('Nette\Security\Diagnostics\UserPanel') && 
			class_exists('Nette\Security\AuthenticationException') && 
			interface_exists('Nette\Security\IUserStorage') && 
			class_exists('Nette\Security\SimpleAuthenticator') && 
			interface_exists('Nette\Security\IRole') && 
			class_exists('Nette\Security\Permission') && 
			interface_exists('Nette\Security\IResource') && 
			interface_exists('Nette\Security\IIdentity') && 
			class_exists('Nette\Reflection\Method') && 
			class_exists('Nette\Reflection\Extension') && 
			interface_exists('Nette\Reflection\IAnnotation') && 
			class_exists('Nette\Reflection\Parameter') && 
			class_exists('Nette\Reflection\AnnotationsParser') && 
			class_exists('Nette\Reflection\Property') && 
			class_exists('Nette\Reflection\ClassType') && 
			class_exists('Nette\Reflection\Annotation') && 
			class_exists('Nette\Reflection\GlobalFunction') && 
			class_exists('Nette\Caching\OutputHelper') && 
			class_exists('Nette\Caching\Cache') && 
			interface_exists('Nette\Caching\IStorage') && 
			class_exists('Nette\Caching\Storages\FileJournal') && 
			class_exists('Nette\Caching\Storages\FileStorage') && 
			class_exists('Nette\Caching\Storages\PhpFileStorage') && 
			class_exists('Nette\Caching\Storages\MemoryStorage') && 
			interface_exists('Nette\Caching\Storages\IJournal') && 
			class_exists('Nette\Caching\Storages\MemcachedStorage') && 
			class_exists('Nette\Caching\Storages\DevNullStorage') && 
			interface_exists('Nette\Localization\ITranslator') && 
			class_exists('Nette\Loaders\RobotLoader') && 
			class_exists('Nette\Loaders\AutoLoader') && 
			interface_exists('Nette\Forms\IFormRenderer') && 
			class_exists('Nette\Forms\Rules') && 
			class_exists('Nette\Forms\Rule') && 
			class_exists('Nette\Forms\Form') && 
			interface_exists('Nette\Forms\IControl') && 
			class_exists('Nette\Forms\ControlGroup') && 
			class_exists('Nette\Forms\Container') && 
			class_exists('Nette\Forms\Controls\ImageButton') && 
			class_exists('Nette\Forms\Controls\UploadControl') && 
			class_exists('Nette\Forms\Controls\Button') && 
			class_exists('Nette\Forms\Controls\SubmitButton') && 
			class_exists('Nette\Forms\Controls\TextInput') && 
			class_exists('Nette\Forms\Controls\SelectBox') && 
			class_exists('Nette\Forms\Controls\TextBase') && 
			class_exists('Nette\Forms\Controls\HiddenField') && 
			class_exists('Nette\Forms\Controls\BaseControl') && 
			class_exists('Nette\Forms\Controls\TextArea') && 
			class_exists('Nette\Forms\Controls\MultiSelectBox') && 
			class_exists('Nette\Forms\Controls\Checkbox') && 
			class_exists('Nette\Forms\Controls\RadioList') && 
			class_exists('Nette\Forms\Rendering\DefaultFormRenderer') && 
			interface_exists('Nette\Forms\ISubmitterControl') && 
			class_exists('Nette\Templating\FileTemplate') && 
			class_exists('Nette\Templating\FilterException') && 
			class_exists('Nette\Templating\Template') && 
			interface_exists('Nette\Templating\ITemplate') && 
			interface_exists('Nette\Templating\IFileTemplate') && 
			class_exists('Nette\Templating\Helpers') && 
			interface_exists('Nette\Application\IResponse') && 
			interface_exists('Nette\Application\IRouter') && 
			class_exists('Nette\Application\Responses\JsonResponse') && 
			class_exists('Nette\Application\Responses\TextResponse') && 
			class_exists('Nette\Application\Responses\FileResponse') && 
			class_exists('Nette\Application\Responses\ForwardResponse') && 
			class_exists('Nette\Application\Responses\RedirectResponse') && 
			class_exists('Nette\Application\UI\Presenter') && 
			interface_exists('Nette\Application\UI\IStatePersistent') && 
			class_exists('Nette\Application\UI\InvalidLinkException') && 
			class_exists('Nette\Application\UI\Form') && 
			class_exists('Nette\Application\UI\BadSignalException') && 
			class_exists('Nette\Application\UI\Multiplier') && 
			class_exists('Nette\Application\UI\Link') && 
			class_exists('Nette\Application\UI\PresenterComponentReflection') && 
			class_exists('Nette\Application\UI\Control') && 
			interface_exists('Nette\Application\UI\IRenderable') && 
			class_exists('Nette\Application\UI\PresenterComponent') && 
			interface_exists('Nette\Application\UI\ISignalReceiver') && 
			class_exists('NetteModule\MicroPresenter') && 
			class_exists('NetteModule\ErrorPresenter') && 
			class_exists('Nette\Application\Diagnostics\RoutingPanel') && 
			interface_exists('Nette\Application\IPresenterFactory') && 
			class_exists('Nette\Application\Application') && 
			interface_exists('Nette\Application\IPresenter') && 
			class_exists('Nette\Application\Routers\SimpleRouter') && 
			class_exists('Nette\Application\Routers\RouteList') && 
			class_exists('Nette\Application\Routers\Route') && 
			class_exists('Nette\Application\Routers\CliRouter') && 
			class_exists('Nette\Application\Request') && 
			class_exists('Nette\Application\PresenterFactory') && 
			class_exists('Nette\Diagnostics\Dumper') && 
			class_exists('Nette\Diagnostics\Debugger') && 
			class_exists('Nette\Diagnostics\Logger') && 
			interface_exists('Nette\Diagnostics\IBarPanel') && 
			class_exists('Nette\Diagnostics\DefaultBarPanel') && 
			class_exists('Nette\Diagnostics\FireLogger') && 
			class_exists('Nette\Diagnostics\BlueScreen') && 
			class_exists('Nette\Diagnostics\Bar') && 
			class_exists('Nette\Diagnostics\Helpers') && 
			class_exists('Nette\Mail\MimePart') && 
			interface_exists('Nette\Mail\IMailer') && 
			class_exists('Nette\Mail\Message') && 
			class_exists('Nette\Mail\SmtpMailer') && 
			class_exists('Nette\Mail\SendmailMailer') && 
			interface_exists('Nette\Http\IResponse') && 
			class_exists('Nette\Http\Response') && 
			class_exists('Nette\Http\RequestFactory') && 
			class_exists('Nette\Http\UserStorage') && 
			class_exists('Nette\Http\Diagnostics\SessionPanel') && 
			interface_exists('Nette\Http\IRequest') && 
			class_exists('Nette\Http\Session') && 
			class_exists('Nette\Http\UrlScript') && 
			class_exists('Nette\Http\SessionSection') && 
			class_exists('Nette\Http\Url') && 
			class_exists('Nette\Http\Context') && 
			class_exists('Nette\Http\Request') && 
			interface_exists('Nette\Http\ISessionStorage') && 
			class_exists('Nette\Http\FileUpload') && 
			class_exists('Nette\Iterators\Mapper') && 
			class_exists('Nette\Iterators\RecursiveFilter') && 
			class_exists('Nette\Iterators\Filter') && 
			class_exists('Nette\Iterators\Recursor') && 
			class_exists('Nette\Iterators\CachingIterator') && 
			class_exists('Nette\DI\Diagnostics\ContainerPanel') && 
			class_exists('Nette\DI\Statement') && 
			class_exists('Nette\DI\Container') && 
			class_exists('Nette\DI\ServiceDefinition') && 
			class_exists('Nette\DI\ContainerBuilder') && 
			class_exists('Nette\DI\Helpers') && 
			class_exists('Nette\Config\Extensions\ConstantsExtension') && 
			class_exists('Nette\Config\Extensions\ExtensionsExtension') && 
			class_exists('Nette\Config\Extensions\NetteExtension') && 
			class_exists('Nette\Config\Extensions\NetteAccessor') && 
			class_exists('Nette\Config\Extensions\PhpExtension') && 
			class_exists('Nette\Config\Compiler') && 
			interface_exists('Nette\Config\IAdapter') && 
			class_exists('Nette\Config\Loader') && 
			class_exists('Nette\Config\Configurator') && 
			class_exists('Nette\Config\CompilerExtension') && 
			class_exists('Nette\Config\Adapters\NeonAdapter') && 
			class_exists('Nette\Config\Adapters\PhpAdapter') && 
			class_exists('Nette\Config\Adapters\IniAdapter') && 
			class_exists('Nette\Config\Helpers') && 
			class_exists('Nette\ComponentModel\Component') && 
			class_exists('Nette\ComponentModel\RecursiveComponentIterator') && 
			interface_exists('Nette\ComponentModel\IComponent') && 
			class_exists('Nette\ComponentModel\Container') && 
			interface_exists('Nette\ComponentModel\IContainer') && 
			class_exists('Nette\Latte\PhpWriter') && 
			class_exists('Nette\Latte\Parser') && 
			class_exists('Nette\Latte\Compiler') && 
			class_exists('Nette\Latte\MacroNode') && 
			class_exists('Nette\Latte\MacroTokenizer') && 
			class_exists('Nette\Latte\Macros\CacheMacro') && 
			class_exists('Nette\Latte\Macros\CoreMacros') && 
			class_exists('Nette\Latte\Macros\FormMacros') && 
			class_exists('Nette\Latte\Macros\UIMacros') && 
			class_exists('Nette\Latte\Macros\MacroSet') && 
			class_exists('Nette\Latte\Token') && 
			class_exists('Nette\Latte\HtmlNode') && 
			interface_exists('Nette\Latte\IMacro') && 
			class_exists('Nette\Latte\Engine') && 
			class_exists('Nette\Database\Reflection\DiscoveredReflection') && 
			class_exists('Nette\Database\Reflection\ConventionalReflection') && 
			class_exists('Nette\Database\Connection') && 
			interface_exists('Nette\Database\ISupplementalDriver') && 
			class_exists('Nette\Database\Diagnostics\ConnectionPanel') && 
			class_exists('Nette\Database\Drivers\OdbcDriver') && 
			class_exists('Nette\Database\Drivers\PgSqlDriver') && 
			class_exists('Nette\Database\Drivers\MsSqlDriver') && 
			class_exists('Nette\Database\Drivers\SqliteDriver') && 
			class_exists('Nette\Database\Drivers\MySqlDriver') && 
			class_exists('Nette\Database\Drivers\OciDriver') && 
			class_exists('Nette\Database\Drivers\Sqlite2Driver') && 
			class_exists('Nette\Database\Statement') && 
			class_exists('Nette\Database\SqlLiteral') && 
			class_exists('Nette\Database\Row') && 
			class_exists('Nette\Database\SqlPreprocessor') && 
			interface_exists('Nette\Database\IReflection') && 
			class_exists('Nette\Database\Helpers') && 
			class_exists('Nette\Database\Table\GroupedSelection') && 
			class_exists('Nette\Database\Table\Selection') && 
			class_exists('Nette\Database\Table\SqlBuilder') && 
			class_exists('Nette\Database\Table\SelectionFactory') && 
			class_exists('Nette\Database\Table\ActiveRow') && 
			class_exists('Nette\Utils\Html') && 
			class_exists('Nette\Utils\Strings') && 
			class_exists('Nette\Utils\Arrays') && 
			class_exists('Nette\Utils\LimitedScope') && 
			class_exists('Nette\Utils\Neon') && 
			class_exists('Nette\Utils\Validators') && 
			class_exists('Nette\Utils\MimeTypeDetector') && 
			class_exists('Nette\Utils\Json') && 
			class_exists('Nette\Utils\Tokenizer') && 
			class_exists('Nette\Utils\Paginator') && 
			class_exists('Nette\Utils\SafeStream') && 
			class_exists('Nette\Utils\Finder') && 
			class_exists('Nette\PhpGenerator\Method') && 
			class_exists('Nette\PhpGenerator\Parameter') && 
			class_exists('Nette\PhpGenerator\PhpLiteral') && 
			class_exists('Nette\PhpGenerator\Property') && 
			class_exists('Nette\PhpGenerator\ClassType') && 
			class_exists('Nette\PhpGenerator\Helpers')
		) ? 'ok' : 'failed', ' ', number_format(((float)microtime(TRUE) - $before) * 1000, 2), 'ms';
		

		$this->terminate();
	}

}
