<?php

namespace Phalcon\Init\Dashboard\UseCases\RateIdea;

use Phalcon\Init\Dashboard\Domain\Contracts\Repositories\IdeasRepositoryInterface;

class RateIdeaUseCase
{
    protected $repository;

    public function __construct(IdeasRepositoryInterface $repository)
    {
        $this->repository = $repository;
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
                $newRating = (float) ($idea->getRating() * $vote + $rating) / (float) ($vote+1);
                $response = $this->repository->rateIdea($ideaId, $newRating, $vote+1);
            }
            // TODO: kirim email 
            return new RateIdeaResponse($response);
        } catch (\Exception $exception) {
            return new RateIdeaResponse($exception->getMessage(), TRUE);
        }
    }
}