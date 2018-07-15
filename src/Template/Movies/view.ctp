<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Movie $movie
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Movie'), ['action' => 'edit', $movie->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Movie'), ['action' => 'delete', $movie->id], ['confirm' => __('Are you sure you want to delete # {0}?', $movie->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Movies'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Movie'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Countries'), ['controller' => 'Countries', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Country'), ['controller' => 'Countries', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Categories'), ['controller' => 'Categories', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Category'), ['controller' => 'Categories', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Likes'), ['controller' => 'Likes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Like'), ['controller' => 'Likes', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Recommendations'), ['controller' => 'Recommendations', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Recommendation'), ['controller' => 'Recommendations', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Scores'), ['controller' => 'Scores', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Score'), ['controller' => 'Scores', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List To Watch Movies'), ['controller' => 'ToWatchMovies', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New To Watch Movie'), ['controller' => 'ToWatchMovies', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List View Movies'), ['controller' => 'ViewMovies', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New View Movie'), ['controller' => 'ViewMovies', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="movies view large-9 medium-8 columns content">
    <h3><?= h($movie->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($movie->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Description') ?></th>
            <td><?= h($movie->description) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Duration') ?></th>
            <td><?= h($movie->duration) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Country') ?></th>
            <td><?= $movie->has('country') ? $this->Html->link($movie->country->name, ['controller' => 'Countries', 'action' => 'view', $movie->country->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Category') ?></th>
            <td><?= $movie->has('category') ? $this->Html->link($movie->category->name, ['controller' => 'Categories', 'action' => 'view', $movie->category->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Image') ?></th>
            <td><?= h($movie->image) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($movie->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($movie->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($movie->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Likes') ?></h4>
        <?php if (!empty($movie->likes)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Movie Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($movie->likes as $likes): ?>
            <tr>
                <td><?= h($likes->id) ?></td>
                <td><?= h($likes->user_id) ?></td>
                <td><?= h($likes->movie_id) ?></td>
                <td><?= h($likes->created) ?></td>
                <td><?= h($likes->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Likes', 'action' => 'view', $likes->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Likes', 'action' => 'edit', $likes->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Likes', 'action' => 'delete', $likes->id], ['confirm' => __('Are you sure you want to delete # {0}?', $likes->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Recommendations') ?></h4>
        <?php if (!empty($movie->recommendations)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Movie Id') ?></th>
                <th scope="col"><?= __('Message') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($movie->recommendations as $recommendations): ?>
            <tr>
                <td><?= h($recommendations->id) ?></td>
                <td><?= h($recommendations->user_id) ?></td>
                <td><?= h($recommendations->movie_id) ?></td>
                <td><?= h($recommendations->message) ?></td>
                <td><?= h($recommendations->created) ?></td>
                <td><?= h($recommendations->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Recommendations', 'action' => 'view', $recommendations->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Recommendations', 'action' => 'edit', $recommendations->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Recommendations', 'action' => 'delete', $recommendations->id], ['confirm' => __('Are you sure you want to delete # {0}?', $recommendations->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Scores') ?></h4>
        <?php if (!empty($movie->scores)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Movie Id') ?></th>
                <th scope="col"><?= __('Value') ?></th>
                <th scope="col"><?= __('Message') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($movie->scores as $scores): ?>
            <tr>
                <td><?= h($scores->id) ?></td>
                <td><?= h($scores->user_id) ?></td>
                <td><?= h($scores->movie_id) ?></td>
                <td><?= h($scores->value) ?></td>
                <td><?= h($scores->message) ?></td>
                <td><?= h($scores->created) ?></td>
                <td><?= h($scores->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Scores', 'action' => 'view', $scores->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Scores', 'action' => 'edit', $scores->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Scores', 'action' => 'delete', $scores->id], ['confirm' => __('Are you sure you want to delete # {0}?', $scores->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related To Watch Movies') ?></h4>
        <?php if (!empty($movie->to_watch_movies)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Movie Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($movie->to_watch_movies as $toWatchMovies): ?>
            <tr>
                <td><?= h($toWatchMovies->id) ?></td>
                <td><?= h($toWatchMovies->user_id) ?></td>
                <td><?= h($toWatchMovies->movie_id) ?></td>
                <td><?= h($toWatchMovies->created) ?></td>
                <td><?= h($toWatchMovies->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'ToWatchMovies', 'action' => 'view', $toWatchMovies->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'ToWatchMovies', 'action' => 'edit', $toWatchMovies->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'ToWatchMovies', 'action' => 'delete', $toWatchMovies->id], ['confirm' => __('Are you sure you want to delete # {0}?', $toWatchMovies->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related View Movies') ?></h4>
        <?php if (!empty($movie->view_movies)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Movie Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($movie->view_movies as $viewMovies): ?>
            <tr>
                <td><?= h($viewMovies->id) ?></td>
                <td><?= h($viewMovies->user_id) ?></td>
                <td><?= h($viewMovies->movie_id) ?></td>
                <td><?= h($viewMovies->created) ?></td>
                <td><?= h($viewMovies->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'ViewMovies', 'action' => 'view', $viewMovies->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'ViewMovies', 'action' => 'edit', $viewMovies->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'ViewMovies', 'action' => 'delete', $viewMovies->id], ['confirm' => __('Are you sure you want to delete # {0}?', $viewMovies->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
