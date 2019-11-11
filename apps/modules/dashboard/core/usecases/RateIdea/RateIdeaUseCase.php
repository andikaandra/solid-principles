<?php

namespace Phalcon\Init\Dashboard\UseCases\RateIdea;

use Phalcon\Init\Dashboard\Domain\Contracts\Repositories\IdeasRepositoryInterface;
use Phalcon\Init\Dashboard\Infrastructure\Services\Contracts\MailerServiceInterface;
use Phalcon\Init\Dashboard\Infrastructure\Services\MailerService;

class RateIdeaUseCase
{
    protected $repository;
    protected $mailerService;

    public function __construct(IdeasRepositoryInterface $repository, MailerServiceInterface $mailerService)
    {
        $this->repository = $repository;
        $this->mailerService = $mailerService;
    }

    public function execute(RateIdeaRequest $request) : RateIdeaResponse
    {
        $ideaId = $request->getIdeaId();
        $rating = $request->getRating();
        try {
            $idea = $this->repository->findIdea($ideaId);
            // idea found
            if ($idea->getId()) {
                // tologn cek float 
                $vote = $idea->getVote();
                $newRating = (float) ( (float) $idea->getRating() * (int)$vote + (int)$rating ) / (float) ($vote+1);
                $response = $this->repository->rateIdea($ideaId, $newRating, $vote+1);
            }
            $author = $this->repository->findAuthorByIdeaId($ideaId);
            // TODO: kirim email
            $this->mailerService
                ->createMessage($author->getEmail(), "noreply@idy.com", "Rating Notification", "A user rated your idea!")
                ->sendMessage();

            return new RateIdeaResponse("Idea successfully rated.");
        } catch (\Exception $exception) {
            return new RateIdeaResponse($exception->getMessage(), TRUE);
        }
    }
}