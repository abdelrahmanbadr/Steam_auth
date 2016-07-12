/*
*    User Class for storing info about chat participant
*
*
*
*/
export class User {
    id: string;
    constructor(public name: string, public avatarSrc: string) {
        
        this.id = uuid();

    }
}

/*
*     Thread Class for the Collection of Messages as well as some data about the user
*
*
*
*/
export class Thread{
    id: string;
    lastMessage: Message;
    name: string;
    avatarSrc: string;

    constructor(id?: string,
                name?: string,
                avatarSrc?: string){
                    this.id = id || uuid();
                    this.name = name;
                    this.avatarSrc = avatarSrc;
                }
}

/*
*    Message Class for storing an individual Message
*
*
*
*/

export class Message {
    id: string;
    sendAt: Date;
    isRead: boolean;
    author: User;
    text: string;
    thread: Thread;
    constructor(obj?: any) {
      this.id        = obj && obj.id        || uuid();  
      this.isRead    = obj && obj.isRead    || false;  
      this.sendAt    = obj && obj.sendAt    || new Date;  
      this.author    = obj && obj.author    || null;  
      this.text      = obj && obj.text      || null();  
      this.thread    = obj && obj.thread    || null;  

    }
}