<?php

class PracticeController extends AbstractCaseController
{
    /**
     * @Route(route="/theme/:blockTheme", constraints={"blockTheme": "\d+"})
     *
     * @param BlockTheme $blockTheme
     *
     * @return \Zend\Stdlib\ResponseInterface|\Zend\View\Model\ViewModel
     */
    public function themeAction(BlockTheme $blockTheme)
    {
        $lock = $this->getLockFactory()->createLock(sprintf('distance-learning.practice-session.%d', $user->getId()), 60);

        try {
            $lock->acquire(true);

            //execute some code

            return $this->renderTwig('test.twig', [
                'theme'         => $blockTheme,
            ]);
        } finally {
            if ($lock->isAcquired()) {
                $lock->release();
            }
        }
    }
}
