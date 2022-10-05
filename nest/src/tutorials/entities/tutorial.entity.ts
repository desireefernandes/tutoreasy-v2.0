import { Column, Entity, PrimaryGeneratedColumn, ManyToOne } from 'typeorm';
import { User } from 'src/users/entities/user.entity';

@Entity('tutorials')
export class Tutorial {
  @PrimaryGeneratedColumn({ type: 'int' })
  id: number;

  @Column()
  title: string;

  @Column()
  describe: string;

//  @Column()
//  image: string;

  @ManyToOne(type => User, user => user.tutorials) 
  user: User;
}
