<?php

class Admin_Component_Event extends Admin_Component_Abstract {

    public function prepare() {
        $event = $this->_params->getEvent('event');
        $venue = $event->getVenue();
        $allowEditing = $this->_params->getBoolean('allowEditing', true);

        $songListSuggested = new Denkmal_Paging_Song_Suggestion($event);
        $songListSuggested->setPage(1, 3);

        $linkListSuggested = new Denkmal_Paging_Link_Suggestion($event);

        $this->setTplParam('event', $event);
        $this->setTplParam('venue', $venue);
        $this->setTplParam('songListSuggested', $songListSuggested);
        $this->setTplParam('linkListSuggested', $linkListSuggested);
        $this->setTplParam('eventDuplicates', $event->getDuplicates());
        $this->setTplParam('allowEditing', $allowEditing);
    }
}
