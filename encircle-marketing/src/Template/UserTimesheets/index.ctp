<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UserTimesheet[]|\Cake\Collection\CollectionInterface $userTimesheets
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New User Timesheet'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><a href = "<?php echo "http://" . $_SERVER['SERVER_NAME'] ."/encircle-marketing/approved-user-timesheets"; ?>">Approved User Timesheets</a></li>
        <li><a href = "<?php echo "http://" . $_SERVER['SERVER_NAME'] ."/encircle-marketing/pending-user-timesheets"; ?>">Pending User Timesheets</a></li>
    </ul>
</nav>
<div class="userTimesheets index large-9 medium-8 columns content">
    <h3><?= __('User Timesheets') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('start_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('start_time') ?></th>
                <th scope="col"><?= $this->Paginator->sort('end_time') ?></th>
                <th scope="col"><?= $this->Paginator->sort('duration') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($userTimesheets as $userTimesheet): ?>
            <tr>
                <td><?= $this->Number->format($userTimesheet->id) ?></td>
                <td><?= $userTimesheet->has('user') ? $this->Html->link($userTimesheet->user->id, ['controller' => 'Users', 'action' => 'view', $userTimesheet->user->id]) : '' ?></td>
                <td><?= h($userTimesheet->start_date) ?></td>
                <td><?= h($userTimesheet->start_time) ?></td>
                <td><?= h($userTimesheet->end_time) ?></td>
                <td><?= $this->Number->format($userTimesheet->duration) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $userTimesheet->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $userTimesheet->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $userTimesheet->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userTimesheet->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
