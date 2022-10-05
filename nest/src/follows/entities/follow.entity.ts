import { Column, Entity, PrimaryGeneratedColumn } from 'typeorm';

@Entity('follows')
export class Follow {
	@PrimaryGeneratedColumn({ type: 'int' })
  	id: number;
}