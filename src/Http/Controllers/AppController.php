<?php

/*
 * This file is part of Laravel Sense.
 *
 * (c) Anton Komarev <a.komarev@cybercog.su>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Cog\Laravel\Sense\Http\Controllers;

class AppController extends Controller
{
    public function __invoke()
    {
        // TODO: Implement dashboard
        return redirect()->to('/sense/requests');
    }
}
